<?php

declare(strict_types=1);

namespace Modules\Media\Handlers;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Closure;
>>>>>>> 49d7c0c (first)
=======
use Closure;
>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use Closure;
>>>>>>> 0d0c96c (Dusting)
=======
>>>>>>> a4cf9d3 (Check & fix styling)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Media\Dto\MediaLibraryRequestItem;
use Modules\Media\Dto\PendingMediaItem;
use Spatie\MediaLibrary\MediaCollections\FileAdderFactory;

<<<<<<< HEAD
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
=======
>>>>>>> a4cf9d3 (Check & fix styling)
class PendingMediaLibraryRequestHandler
{
    protected Collection $mediaLibraryRequestItems;

    protected ?array $processCustomProperties = null;

    protected ?array $customHeaders = null;

    public function __construct(array $mediaLibraryRequestItems, protected Model $model, protected bool $preserveExisting)
    {
        $this->mediaLibraryRequestItems = collect($mediaLibraryRequestItems)
            ->map(fn (array $properties): MediaLibraryRequestItem => MediaLibraryRequestItem::fromArray($properties));
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string|callable $mediaName
     */
    public function usingName($mediaName): self
    {
        if (\is_string($mediaName)) {
=======
     * @param  string|callable  $mediaName
     */
    public function usingName($mediaName): self
    {
        if (is_string($mediaName)) {
>>>>>>> 49d7c0c (first)
=======
     * @param  string|callable  $mediaName
     */
    public function usingName($mediaName): self
    {
        if (is_string($mediaName)) {
>>>>>>> master
=======
     * @param string|callable $mediaName
     */
    public function usingName($mediaName): self
    {
        if (\is_string($mediaName)) {
>>>>>>> ed2c51e (Check & fix styling)
=======
     * @param  string|callable  $mediaName
     */
    public function usingName($mediaName): self
    {
        if (is_string($mediaName)) {
>>>>>>> 0d0c96c (Dusting)
=======
     * @param string|callable $mediaName
     */
    public function usingName($mediaName): self
    {
        if (\is_string($mediaName)) {
>>>>>>> a4cf9d3 (Check & fix styling)
            return $this->usingName(fn (): string => $mediaName);
        }

        $callable = $mediaName;

        $this->mediaLibraryRequestItems->each(
            function (MediaLibraryRequestItem $mediaLibraryRequestItem) use ($callable): void {
                $name = $callable($mediaLibraryRequestItem);

                $mediaLibraryRequestItem->name = $name;
            }
        );

        return $this;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string|\Closure $fileName
     */
    public function usingFileName($fileName): self
    {
        if (\is_string($fileName)) {
=======
     * @param  string|Closure  $fileName
     */
    public function usingFileName($fileName): self
    {
        if (is_string($fileName)) {
>>>>>>> 49d7c0c (first)
=======
     * @param  string|Closure  $fileName
     */
    public function usingFileName($fileName): self
    {
        if (is_string($fileName)) {
>>>>>>> master
=======
     * @param string|\Closure $fileName
     */
    public function usingFileName($fileName): self
    {
        if (\is_string($fileName)) {
>>>>>>> ed2c51e (Check & fix styling)
=======
     * @param  string|Closure  $fileName
     */
    public function usingFileName($fileName): self
    {
        if (is_string($fileName)) {
>>>>>>> 0d0c96c (Dusting)
=======
     * @param string|\Closure $fileName
     */
    public function usingFileName($fileName): self
    {
        if (\is_string($fileName)) {
>>>>>>> a4cf9d3 (Check & fix styling)
            return $this->usingFileName(fn (): string => $fileName);
        }

        $callable = $fileName;

        $this->mediaLibraryRequestItems->each(
            function (MediaLibraryRequestItem $mediaLibraryRequestItem) use ($callable): void {
                $fileName = $callable($mediaLibraryRequestItem);

                $mediaLibraryRequestItem->fileName = $fileName;
            });

        return $this;
    }

    public function withCustomProperties(...$customPropertyNames): self
    {
        $this->processCustomProperties = $customPropertyNames;

        return $this;
    }

    public function addCustomHeaders(array $customHeaders): self
    {
        $this->customHeaders = $customHeaders;

        return $this;
    }

    public function toMediaLibrary(string $collectionName = 'default', string $diskName = ''): void
    {
        $this->toMediaCollection($collectionName, $diskName);
    }

    public function toMediaCollection(string $collectionName = 'default', string $diskName = ''): void
    {
        $mediaLibraryRequestHandler = MediaLibraryRequestHandler::createForMediaLibraryRequestItems($this->model, $this->mediaLibraryRequestItems, $collectionName)
            ->updateExistingMedia();

        if (! $this->preserveExisting) {
            $mediaLibraryRequestHandler->deleteObsoleteMedia();
        }
        $mediaLibraryRequestHandler
            ->getPendingMediaItems()
            ->each(
                function (PendingMediaItem $pendingMediaItem) use ($diskName, $collectionName): void {
                    $fileAdder = app(FileAdderFactory::class)->createForPendingMedia($this->model, $pendingMediaItem);

                    if (null !== $this->processCustomProperties) {
                        $fileAdder->withCustomProperties($pendingMediaItem->getCustomProperties($this->processCustomProperties));
                    }

                    if (null !== $this->customHeaders) {
                        $fileAdder = $fileAdder->addCustomHeaders($this->customHeaders);
                    }

                    if (null !== $pendingMediaItem->fileName) {
                        $fileAdder->setFileName($pendingMediaItem->fileName);
                    }

                    $fileAdder->toMediaCollection($collectionName, $diskName);
                });
    }
}
