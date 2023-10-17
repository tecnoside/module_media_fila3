<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Carbon\Carbon;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Closure;
use Exception;
>>>>>>> 49d7c0c (first)
=======
use Closure;
use Exception;
>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use Closure;
use Exception;
>>>>>>> 0d0c96c (Dusting)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Modules\Media\Exceptions\CouldNotAddUpload;
use Modules\Media\Exceptions\TemporaryUploadDoesNotBelongToCurrentSession;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use function is_string;

>>>>>>> 49d7c0c (first)
=======
use function is_string;

>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use function is_string;

>>>>>>> 0d0c96c (Dusting)
class TemporaryUpload extends Model implements HasMedia
{
    use InteractsWithMedia;
    use MassPrunable;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public static ?\Closure $manipulatePreview = null;
=======
    public static ?Closure $manipulatePreview = null;
>>>>>>> 49d7c0c (first)
=======
    public static ?Closure $manipulatePreview = null;
>>>>>>> master
=======
    public static ?\Closure $manipulatePreview = null;
>>>>>>> ed2c51e (Check & fix styling)
=======
    public static ?Closure $manipulatePreview = null;
>>>>>>> 0d0c96c (Dusting)

    public static ?string $disk = null;

    protected $guarded = [];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public static function previewManipulation(\Closure $closure): void
=======
    public static function previewManipulation(Closure $closure): void
>>>>>>> 49d7c0c (first)
=======
    public static function previewManipulation(Closure $closure): void
>>>>>>> master
=======
    public static function previewManipulation(\Closure $closure): void
>>>>>>> ed2c51e (Check & fix styling)
=======
    public static function previewManipulation(Closure $closure): void
>>>>>>> 0d0c96c (Dusting)
    {
        static::$manipulatePreview = $closure;
    }

    public static function findByMediaUuid(?string $mediaUuid): ?self
    {
        $mediaModelClass = (string) config('media-library.media_model');

        /** @var Media $media */
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
        if (! ($temporaryUpload = static::findByMediaUuid($mediaUuid)) instanceof \Modules\Media\Models\TemporaryUpload) {
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
        /** @var \Modules\Media\Models\TemporaryUpload $temporaryUpload */
        $temporaryUpload = static::create([
            'session_id' => $sessionId,
        ]);

        if (static::findByMediaUuid($uuid) instanceof \Modules\Media\Models\TemporaryUpload) {
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
        /** @var \Modules\Media\Models\TemporaryUpload $temporaryUpload */
        $temporaryUpload = static::create([
            'session_id' => $sessionId,
        ]);

        if (static::findByMediaUuid($uuid) instanceof \Modules\Media\Models\TemporaryUpload) {
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (\is_string($res)) {
            return $res;
        }
        throw new \Exception('['.__LINE__.']['.__FILE__.']');
=======
        if (is_string($res)) {
            return $res;
        }
        throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 49d7c0c (first)
=======
        if (is_string($res)) {
            return $res;
        }
        throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> master
=======
        if (\is_string($res)) {
            return $res;
        }
        throw new \Exception('['.__LINE__.']['.__FILE__.']');
>>>>>>> ed2c51e (Check & fix styling)
=======
        if (is_string($res)) {
            return $res;
        }
        throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 0d0c96c (Dusting)
    }

    public function scopeOld(Builder $builder): void
    {
        $builder->where('created_at', '<=', Carbon::now()->subDay()->toDateTimeString());
    }

    public function registerMediaConversions(\Spatie\MediaLibrary\MediaCollections\Models\Media $media = null): void
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

        if (! $media instanceof \Spatie\MediaLibrary\MediaCollections\Models\Media) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
=======
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 49d7c0c (first)
=======
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> master
=======
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
>>>>>>> ed2c51e (Check & fix styling)
=======
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 0d0c96c (Dusting)
        }

        $temporaryUploadModel = $media->model;
        $uuid = $media->uuid;

        $newMedia = $media->move($hasMedia, $collectionName, $diskName, $fileName);

        $temporaryUploadModel->delete();

        $newMedia->update(['uuid' => $uuid]);

        return $newMedia;
    }

    public function prunable(): Builder
    {
        return self::query()->old();
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected function getPreviewManipulation(): \Closure
=======
    protected function getPreviewManipulation(): Closure
>>>>>>> 49d7c0c (first)
=======
    protected function getPreviewManipulation(): Closure
>>>>>>> master
=======
    protected function getPreviewManipulation(): \Closure
>>>>>>> ed2c51e (Check & fix styling)
=======
    protected function getPreviewManipulation(): Closure
>>>>>>> 0d0c96c (Dusting)
    {
        return static::$manipulatePreview ?? function (Conversion $conversion): void {
            $conversion->fit(Manipulations::FIT_CROP, 300, 300);
        };
    }
}
