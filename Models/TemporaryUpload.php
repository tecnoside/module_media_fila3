<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Closure;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Modules\Media\Exceptions\CouldNotAddUpload;
use Modules\Media\Exceptions\TemporaryUploadDoesNotBelongToCurrentSession;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Webmozart\Assert\Assert;

use function is_string;

/**
 * Modules\Media\Models\TemporaryUpload.
 *
 * @property int $id
 * @property string $session_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryUpload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryUpload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryUpload query()
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryUpload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryUpload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryUpload whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemporaryUpload whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class TemporaryUpload extends Model implements HasMedia
{
    use InteractsWithMedia;
    use MassPrunable;

    public static ?Closure $manipulatePreview = null;

    public static ?string $disk = null;

    /** @var string */
    protected $connection = 'media';

    /**
     * @var array<string>|bool
     */
    protected $guarded = [];

    public static function findByMediaUuid(?string $mediaUuid): ?self
    {
        Assert::string($mediaModelClass = config('media-library.media_model'));

        /**
         * @var Media $media
         */
        $media = $mediaModelClass::query()
            ->where('uuid', $mediaUuid)
            ->first();

        if (! $media) {
            return null;
        }

        $temporaryUpload = $media->model;

        if (! $temporaryUpload instanceof self) {
            return null;
        }

        return $temporaryUpload;
    }

    public static function findByMediaUuidInCurrentSession(?string $mediaUuid): ?self
    {
        if (! ($temporaryUpload = static::findByMediaUuid($mediaUuid)) instanceof self) {
            return null;
        }

        if (config('media-library.enable_temporary_uploads_session_affinity', true) && $temporaryUpload->session_id !== session()->getId()) {
            return null;
        }

        return $temporaryUpload;
    }

    public static function createForFile(
        UploadedFile $uploadedFile,
        string $sessionId,
        string $uuid,
        string $name
    ): self {
        /**
         * @var TemporaryUpload $temporaryUpload
         */
        $temporaryUpload = static::create(
            [
                'session_id' => $sessionId,
            ]
        );

        if (static::findByMediaUuid($uuid) instanceof self) {
            throw CouldNotAddUpload::uuidAlreadyExists();
        }

        $temporaryUpload
            ->addMedia($uploadedFile)
            ->setName($name)
            ->withProperties(['uuid' => $uuid])
            ->toMediaCollection('default', static::getDiskName());
        // Debugbar::info('TemporaruUpload UUID', $uuid);
        $temporaryUpload->fresh();

        return $temporaryUpload;
    }

    public static function createForRemoteFile(
        string $file,
        string $sessionId,
        string $uuid,
        string $name,
        string $diskName
    ): self {
        /**
         * @var TemporaryUpload $temporaryUpload
         */
        $temporaryUpload = static::create(
            [
                'session_id' => $sessionId,
            ]
        );

        if (static::findByMediaUuid($uuid) instanceof self) {
            throw CouldNotAddUpload::uuidAlreadyExists();
        }

        $temporaryUpload
            ->addMediaFromDisk($file, $diskName)
            ->setName($name)
            ->usingFileName($name)
            ->withProperties(['uuid' => $uuid])
            ->toMediaCollection('default', static::getDiskName());

        $temporaryUpload->fresh();

        return $temporaryUpload;
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        if (! config('media-library.generate_thumbnails_for_temporary_uploads')) {
            return;
        }

        $conversion = $this
            ->addMediaConversion('preview')
            ->nonQueued();

        $previewManipulation = $this->getPreviewManipulation();

        $previewManipulation($conversion);
    }

    public function moveMedia(HasMedia $hasMedia, string $collectionName, string $diskName, string $fileName): Media
    {
        if (config('media-library.enable_temporary_uploads_session_affinity', true) && $this->session_id !== session()->getId()) {
            throw TemporaryUploadDoesNotBelongToCurrentSession::create();
        }

        $media = $this->getFirstMedia();

        // if (! $media instanceof \Spatie\MediaLibrary\MediaCollections\Models\Media) {
        //    throw new \Exception('['.__LINE__.']['.class_basename($this).']');
        // }
        Assert::isInstanceOf($media, Media::class, '[' . __LINE__ . '][' . class_basename($this) . ']');

        $temporaryUploadModel = $media->model;
        $uuid = $media->uuid;

        $newMedia = $media->move($hasMedia, $collectionName, $diskName, $fileName);

        $temporaryUploadModel?->delete();

        $newMedia->update(['uuid' => $uuid]);

        return $newMedia;
    }

    protected static function getDiskName(): string
    {
        $res = static::$disk ?? config('media-library.disk_name');
        if (is_string($res)) {
            return $res;
        }
        throw new Exception('[' . __LINE__ . '][' . class_basename(__CLASS__) . ']');
    }

    // public function prunable(): Builder
    // { Call to an undefined method Illuminate\Database\Eloquent\Builder<Modules\Media\Models\TemporaryUpload>::old().
    //    return self::query()->old();
    // }

    protected function getPreviewManipulation(): Closure
    {
        return static::$manipulatePreview ?? function (Conversion $conversion): void {
            $conversion->fit(Fit::Crop, 300, 300);
            // $conversion->fit('crop', 300, 300);
        };
    }
}
