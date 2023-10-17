<?php

declare(strict_types=1);

namespace Modules\Media\Dto;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Exception;
>>>>>>> 49d7c0c (first)
=======
use Exception;
>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use Exception;
>>>>>>> 0d0c96c (Dusting)
=======
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use Exception;
>>>>>>> ca4973d (Dusting)
=======
>>>>>>> 93f1e9f (Check & fix styling)
=======
use Exception;
>>>>>>> cafc8d1 (Dusting)
=======
>>>>>>> c47cbe6 (Check & fix styling)
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Modules\Media\Models\TemporaryUpload;

class PendingMediaItem
{
    public TemporaryUpload $temporaryUpload;

    public function __construct(
        string $uuid,
        public string $name,
        public int $order,
        public array $customProperties,
        array $customHeaders,
        public ?string $fileName = null
    ) {
        $temporaryUploadModelClass = config('media-library.temporary_upload_model');

        if (! $temporaryUpload = $temporaryUploadModelClass::findByMediaUuidInCurrentSession($uuid)) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \Exception('invalid uuid');
=======
            throw new Exception('invalid uuid');
>>>>>>> 49d7c0c (first)
=======
            throw new Exception('invalid uuid');
>>>>>>> master
=======
            throw new \Exception('invalid uuid');
>>>>>>> ed2c51e (Check & fix styling)
=======
            throw new Exception('invalid uuid');
>>>>>>> 0d0c96c (Dusting)
=======
            throw new \Exception('invalid uuid');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            throw new Exception('invalid uuid');
>>>>>>> ca4973d (Dusting)
=======
            throw new \Exception('invalid uuid');
>>>>>>> 93f1e9f (Check & fix styling)
=======
            throw new Exception('invalid uuid');
>>>>>>> cafc8d1 (Dusting)
=======
            throw new \Exception('invalid uuid');
>>>>>>> c47cbe6 (Check & fix styling)
        }

        $this->temporaryUpload = $temporaryUpload;
    }

    public static function createFromArray(array $pendingMediaItems): Collection
    {
        return collect($pendingMediaItems)
            ->map(fn (array $uploadAttributes): static => new static(
                $uploadAttributes['uuid'],
                $uploadAttributes['name'] ?? '',
                $uploadAttributes['order'] ?? 0,
                $uploadAttributes['custom_properties'] ?? [],
                $uploadAttributes['fileName'] ?? null,
            ));
    }

    public function toArray(): array
    {
        $media = $this->temporaryUpload->getFirstMedia();

        return [
            'uuid' => $media->uuid,
            'name' => $this->name,
            'order' => $this->order,
            'custom_properties' => $this->customProperties,
            'size' => $media->size,
            'mime' => $media->mime,
        ];
    }

    public function getCustomProperties(array $customPropertyNames): array
    {
        if ([] === $customPropertyNames) {
            return $this->customProperties;
        }

        return collect($customPropertyNames)
            ->filter(fn (string $customProperty) => Arr::has($this->customProperties, $customProperty))
            ->mapWithKeys(fn ($name): array => [$name => Arr::get($this->customProperties, $name)])
            ->toArray();
    }
}
