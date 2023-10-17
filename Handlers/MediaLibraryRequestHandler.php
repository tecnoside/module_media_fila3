<?php

declare(strict_types=1);

namespace Modules\Media\Handlers;

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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Media\Dto\MediaLibraryRequestItem;
use Modules\Media\Dto\PendingMediaItem;
use Modules\Media\Models\Media;
use Spatie\MediaLibrary\HasMedia;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use function in_array;

>>>>>>> 49d7c0c (first)
=======
use function in_array;

>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use function in_array;

>>>>>>> 0d0c96c (Dusting)
=======
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use function in_array;

>>>>>>> ca4973d (Dusting)
=======
>>>>>>> 93f1e9f (Check & fix styling)
class MediaLibraryRequestHandler
{
    protected array $existingUuids;

    protected string $collectionName;

    protected function __construct(protected Model $model, protected Collection $collection, string $collectionName)
    {
        if (! $this->model instanceof HasMedia) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> ca4973d (Dusting)
=======
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
>>>>>>> 93f1e9f (Check & fix styling)
        }

        $this->existingUuids = $this->model->getMedia($collectionName)->pluck('uuid')->toArray();

        $this->collectionName = $collectionName;
    }

    public static function createForMediaLibraryRequestItems(
        Model $model,
        Collection $collection,
        string $collectionName
    ): self {
        // prima era new static
        return new self($model, $collection, $collectionName);
    }

    public function updateExistingMedia(): self
    {
        $this
            ->existingMediaLibraryRequestItems()
            ->each(
                function (MediaLibraryRequestItem $mediaLibraryRequestItem): void {
                    $this->handleExistingMediaLibraryRequestItem($mediaLibraryRequestItem);
                }
            );

        return $this;
    }

    public function deleteObsoleteMedia(): self
    {
        $keepUuids = $this->collection->pluck('uuid')->toArray();

        $this->model->getMedia($this->collectionName)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->reject(fn (Media $media): bool => \in_array($media->uuid, $keepUuids, true))
=======
            ->reject(fn (Media $media): bool => in_array($media->uuid, $keepUuids, true))
>>>>>>> 49d7c0c (first)
=======
            ->reject(fn (Media $media): bool => in_array($media->uuid, $keepUuids, true))
>>>>>>> master
=======
            ->reject(fn (Media $media): bool => \in_array($media->uuid, $keepUuids, true))
>>>>>>> ed2c51e (Check & fix styling)
=======
            ->reject(fn (Media $media): bool => in_array($media->uuid, $keepUuids, true))
>>>>>>> 0d0c96c (Dusting)
=======
            ->reject(fn (Media $media): bool => \in_array($media->uuid, $keepUuids, true))
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            ->reject(fn (Media $media): bool => in_array($media->uuid, $keepUuids, true))
>>>>>>> ca4973d (Dusting)
=======
            ->reject(fn (Media $media): bool => \in_array($media->uuid, $keepUuids, true))
>>>>>>> 93f1e9f (Check & fix styling)
            ->each(fn (Media $media) => $media->delete());

        return $this;
    }

    public function getPendingMediaItems(): Collection
    {
        return $this
            ->newMediaLibraryRequestItems()
            ->map(
                fn (MediaLibraryRequestItem $mediaLibraryRequestItem): PendingMediaItem => new PendingMediaItem(
                    $mediaLibraryRequestItem->uuid,
                    $mediaLibraryRequestItem->name,
                    $mediaLibraryRequestItem->order,
                    $mediaLibraryRequestItem->customProperties,
                    $mediaLibraryRequestItem->customHeaders,
                    $mediaLibraryRequestItem->fileName,
                ));
    }

    protected function existingMediaLibraryRequestItems(): Collection
    {
        return $this
            ->collection
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 49d7c0c (first)
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> master
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> ed2c51e (Check & fix styling)
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 0d0c96c (Dusting)
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> ca4973d (Dusting)
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 93f1e9f (Check & fix styling)
    }

    protected function newMediaLibraryRequestItems(): Collection
    {
        return $this
            ->collection
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 49d7c0c (first)
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> master
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> ed2c51e (Check & fix styling)
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 0d0c96c (Dusting)
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> ca4973d (Dusting)
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 93f1e9f (Check & fix styling)
    }

    protected function handleExistingMediaLibraryRequestItem(MediaLibraryRequestItem $mediaLibraryRequestItem): void
    {
        $mediaModelClass = config('media-library.media_model');

        $media = $mediaModelClass::findByUuid($mediaLibraryRequestItem->uuid);

        $media->update([
            'name' => $mediaLibraryRequestItem->name,
            'custom_properties' => $mediaLibraryRequestItem->customProperties,
            'order_column' => $mediaLibraryRequestItem->order,
        ]);
    }
}
