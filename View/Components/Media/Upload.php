<?php

declare(strict_types=1);

namespace Modules\Media\View\Components\Media;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Webmozart\Assert\Assert;

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
<<<<<<< HEAD
        ?string $propertiesView = null,
=======
        string $propertiesView = null,
>>>>>>> dev
        public ?string $fieldsView = null
    ) {
        Assert::isArray($media = old($name) ?? []);
        $this->media = $media;
        $this->propertiesView = $propertiesView ?? 'media::livewire.partials.attachment.properties';
    }

    /**
     * @return View
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
>>>>>>> dev
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
>>>>>>> dev
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
>>>>>>> dev
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
