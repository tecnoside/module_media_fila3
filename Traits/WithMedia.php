<?php

declare(strict_types=1);

namespace Modules\Media\Traits;

use Livewire\Component;

/**
* 
 *
 * @mixin Component 
*/
trait WithMedia
{
    /**
     * @return string[]
     *
     * @psalm-return array<string>
     */
    public function getMediaComponentNames(): array
    {
        // return $this->mediaComponentNames ?? []; // on left side of ?? is not nullable.
        return $this->mediaComponentNames;
    }

    public function mountWithMedia(): void
    {
        foreach ($this->getMediaComponentNames() as $mediaComponentName) {
            $this->$mediaComponentName = null;
        }
    }

    public function hydrateWithMedia(): void
    {
        foreach ($this->getMediaComponentNames() as $mediaComponentName) {
            $this->listeners[sprintf('%s:mediaChanged', $mediaComponentName)] = 'onMediaChanged';
        }
    }

    public function onMediaChanged(string $name, array $media): void
    {
        $media = $this->makeSureCustomPropertiesUseRightCasing($media);

        $this->$name = $media;
    }

    public function renderingWithMedia(): void
    {
        $errorBag = $this->getErrorBag();

        foreach ($this->getMediaComponentNames() as $mediaComponentName) {
            $this->dispatch(sprintf('%s:mediaComponentValidationErrors', $mediaComponentName), $mediaComponentName, $errorBag->toArray());
        }
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 76f3bf5f (first)
=======
>>>>>>> 2f59e24c (.)
     * @param  array|null  $mediaComponentNames
     */
    public function clearMedia($mediaComponentNames = null): void
    {
        if ($mediaComponentNames === null) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6444d42f (rebase 7)
     * @param array|null $mediaComponentNames
     */
    public function clearMedia($mediaComponentNames = null): void
    {
        if ($mediaComponentNames === null) {
<<<<<<< HEAD
=======
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
>>>>>>> 2f59e24c (.)
            $mediaComponentNames = $this->getMediaComponentNames();
        }

        foreach ($mediaComponentNames as $mediumComponentName) {
            $this->dispatch(sprintf('%s:clearMedia', $mediumComponentName), $mediumComponentName);

            $this->{$mediumComponentName} = [];
        }
    }

    protected function makeSureCustomPropertiesUseRightCasing(array $media): array
    {
        return collect($media)
            ->map(
                function (array $mediaItemAttributes): array {
                    if (! isset($mediaItemAttributes['custom_properties']) && isset($mediaItemAttributes['customProperties'])) {
                        $mediaItemAttributes['custom_properties'] = $mediaItemAttributes['customProperties'];
                        unset($mediaItemAttributes['customProperties']);
                    }

                    return $mediaItemAttributes;
                }
            )
            ->toArray();
    }
}
