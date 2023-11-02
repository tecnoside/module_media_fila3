<?php

declare(strict_types=1);

namespace Modules\Media\View\Components\Media;

use Illuminate\View\Component;

class Upload extends Component
{
    public array $media;

    public ?string $propertiesView = null;

    public function __construct(
        public string $name,
        public string $rules = '',
        public bool $multiple = false,
        public bool $editableName = false,
        public ?int $maxItems = null,
        public ?string $componentView = null,
        public ?string $listView = null,
        public ?string $itemView = null,
        string $propertiesView = null,
        public ?string $fieldsView = null
    ) {
        Assert::isArray($media = old($name) ?? []);
        $this->media = $media;
        $this->propertiesView = $propertiesView ?? 'media::livewire.partials.attachment.properties';
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('media::components.media.attachment');
    }

    public function determineListViewName(): string
    {
<<<<<<< HEAD
        if ($this->listView !== null) {
=======
        if (null !== $this->listView) {
>>>>>>> 16fe374 (up)
            return $this->listView;
        }

        return 'media::livewire.partials.attachment.list';
    }

    public function determineItemViewName(): string
    {
<<<<<<< HEAD
        if ($this->itemView !== null) {
=======
        if (null !== $this->itemView) {
>>>>>>> 16fe374 (up)
            return $this->itemView;
        }

        return 'media::livewire.partials.attachment.item';
    }

    public function determineFieldsViewName(): string
    {
<<<<<<< HEAD
        if ($this->fieldsView !== null) {
=======
        if (null !== $this->fieldsView) {
>>>>>>> 16fe374 (up)
            return $this->fieldsView;
        }

        return 'media::livewire.partials.attachment.fields';
    }

    public function determineMaxItems(): ?int
    {
        return $this->multiple
            ? $this->maxItems
            : 1;
    }
}
