<?php

declare(strict_types=1);

namespace Modules\Media\Handlers;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Exception;
>>>>>>> 49d7c0c (first)
=======
use Exception;
>>>>>>> master
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Media\Dto\MediaLibraryRequestItem;
use Modules\Media\Dto\PendingMediaItem;
use Modules\Media\Models\Media;
use Spatie\MediaLibrary\HasMedia;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use function in_array;

>>>>>>> 49d7c0c (first)
=======
use function in_array;

>>>>>>> master
class MediaLibraryRequestHandler
{
    protected array $existingUuids;

    protected string $collectionName;

    protected function __construct(protected Model $model, protected Collection $collection, string $collectionName)
    {
        if (! $this->model instanceof HasMedia) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
=======
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 49d7c0c (first)
=======
            throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> master
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
            ->reject(fn (Media $media): bool => \in_array($media->uuid, $keepUuids, true))
=======
            ->reject(fn (Media $media): bool => in_array($media->uuid, $keepUuids, true))
>>>>>>> 49d7c0c (first)
=======
            ->reject(fn (Media $media): bool => in_array($media->uuid, $keepUuids, true))
>>>>>>> master
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
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 49d7c0c (first)
=======
            ->filter(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> master
    }

    protected function newMediaLibraryRequestItems(): Collection
    {
        return $this
            ->collection
<<<<<<< HEAD
<<<<<<< HEAD
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => \in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> 49d7c0c (first)
=======
            ->reject(fn (MediaLibraryRequestItem $mediaLibraryRequestItem): bool => in_array($mediaLibraryRequestItem->uuid, $this->existingUuids, true));
>>>>>>> master
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
