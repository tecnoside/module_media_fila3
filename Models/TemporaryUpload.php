<?php

declare(strict_types=1);

namespace Modules\Media\Models;

<<<<<<< HEAD
use Closure;
use Exception;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Closure;
use Exception;
=======
>>>>>>> 771f698d (first)
=======
use Closure;
use Exception;
>>>>>>> 7cc85766 (rebase 1)
=======
use Closure;
use Exception;
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Modules\Media\Exceptions\CouldNotAddUpload;
use Modules\Media\Exceptions\TemporaryUploadDoesNotBelongToCurrentSession;
<<<<<<< HEAD
use Spatie\Image\Enums\Fit;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\Image\Enums\Fit;
=======
use Spatie\Image\Manipulations;
>>>>>>> 771f698d (first)
=======
use Spatie\Image\Enums\Fit;
>>>>>>> 7cc85766 (rebase 1)
=======
use Spatie\Image\Enums\Fit;
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
use function is_string;

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use function is_string;

=======
>>>>>>> 771f698d (first)
=======
use function is_string;

>>>>>>> 7cc85766 (rebase 1)
=======
use function is_string;

>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
/**
 * Modules\Media\Models\TemporaryUpload.
 *
 * @property int                                                                                  $id
 * @property string                                                                               $session_id
 * @property \Illuminate\Support\Carbon|null                                                      $created_at
 * @property \Illuminate\Support\Carbon|null                                                      $updated_at
 * @property \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property int|null                                                                             $media_count
 * @method static Builder|TemporaryUpload newModelQuery()
 * @method static Builder|TemporaryUpload newQuery()
 * @method static Builder|TemporaryUpload query()
 * @method static Builder|TemporaryUpload whereCreatedAt($value)
 * @method static Builder|TemporaryUpload whereId($value)
 * @method static Builder|TemporaryUpload whereSessionId($value)
 * @method static Builder|TemporaryUpload whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TemporaryUpload extends Model implements HasMedia
{
    use InteractsWithMedia;
    use MassPrunable;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    public static ?Closure $manipulatePreview = null;

    public static ?string $disk = null;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 771f698d (first)
=======
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    /**
     * @var string
     */
    protected $connection = 'media';

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public static ?\Closure $manipulatePreview = null;

    public static ?string $disk = null;

>>>>>>> 771f698d (first)
=======
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    /**
     * @var array<string>|bool
     */
    protected $guarded = [];

    public static function findByMediaUuid(?string $mediaUuid): ?self
    {
        Assert::string($mediaModelClass = config('media-library.media_model'));

        /**
* 
         *
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
<<<<<<< HEAD
        /**
* 
         *
 * @var TemporaryUpload $temporaryUpload 
*/
        $temporaryUpload = static::create(
            [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var TemporaryUpload $temporaryUpload */
=======
        /** @var \Modules\Media\Models\TemporaryUpload $temporaryUpload */
>>>>>>> 771f698d (first)
=======
        /** @var TemporaryUpload $temporaryUpload */
>>>>>>> 7cc85766 (rebase 1)
=======
        /** @var TemporaryUpload $temporaryUpload */
>>>>>>> 76f3bf5f (first)
        $temporaryUpload = static::create([
>>>>>>> 6444d42f (rebase 7)
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
<<<<<<< HEAD
        /**
* 
         *
 * @var TemporaryUpload $temporaryUpload 
*/
        $temporaryUpload = static::create(
            [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var TemporaryUpload $temporaryUpload */
=======
        /** @var \Modules\Media\Models\TemporaryUpload $temporaryUpload */
>>>>>>> 771f698d (first)
=======
        /** @var TemporaryUpload $temporaryUpload */
>>>>>>> 7cc85766 (rebase 1)
=======
        /** @var TemporaryUpload $temporaryUpload */
>>>>>>> 76f3bf5f (first)
        $temporaryUpload = static::create([
>>>>>>> 6444d42f (rebase 7)
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

    protected static function getDiskName(): string
    {
        $res = static::$disk ?? config('media-library.disk_name');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
        if (is_string($res)) {
            return $res;
        }
        throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
    }

    public function registerMediaConversions(?Media $media = null): void
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        if (\is_string($res)) {
=======
        if (is_string($res)) {
>>>>>>> 7cc85766 (rebase 1)
            return $res;
        }
        throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
    }

<<<<<<< HEAD
    public function registerMediaConversions(Media $media = null): void
>>>>>>> 771f698d (first)
=======
    public function registerMediaConversions(?Media $media = null): void
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
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
        //    throw new \Exception('['.__LINE__.']['.__FILE__.']');
        // }
        Assert::isInstanceOf($media, Media::class);

        $temporaryUploadModel = $media->model;
        $uuid = $media->uuid;

        $newMedia = $media->move($hasMedia, $collectionName, $diskName, $fileName);

        $temporaryUploadModel->delete();

        $newMedia->update(['uuid' => $uuid]);

        return $newMedia;
    }

    // public function prunable(): Builder
    // { Call to an undefined method Illuminate\Database\Eloquent\Builder<Modules\Media\Models\TemporaryUpload>::old().
    //    return self::query()->old();
    // }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    protected function getPreviewManipulation(): Closure
    {
        return static::$manipulatePreview ?? function (Conversion $conversion): void {
            $conversion->fit(Fit::Crop, 300, 300);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    protected function getPreviewManipulation(): \Closure
    {
        return static::$manipulatePreview ?? function (Conversion $conversion): void {
            $conversion->fit(Manipulations::FIT_CROP, 300, 300);
>>>>>>> 771f698d (first)
=======
    protected function getPreviewManipulation(): Closure
    {
        return static::$manipulatePreview ?? function (Conversion $conversion): void {
            $conversion->fit(Fit::Crop, 300, 300);
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
        };
    }
}
