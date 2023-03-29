<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
namespace Modules\Media\View\Components\Media;

use Illuminate\View\Component;

<<<<<<< HEAD
class MediaLibraryAttachmentComponent extends Component
{
=======
class Upload extends Component {
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
    public array $media;

    public ?string $propertiesView = null;

    public function __construct(
        public string $name,
        public string $rules = '',
        public $multiple = false,
        public $editableName = false,
        public ?int $maxItems = null,
        public ?string $componentView = null,
        public ?string $listView = null,
        public ?string $itemView = null,
        ?string $propertiesView = null,
        public ?string $fieldsView = null
    ) {
        $this->media = old($name) ?? [];
<<<<<<< HEAD
        $this->propertiesView = $propertiesView ?? 'media::livewire.partials.attachment.properties';
    }

    public function render()
    {
        return view('media::components.media-library-attachment');
    }

    public function determineListViewName(): string
    {
=======
        $this->propertiesView = $propertiesView ?? 'media-library::livewire.partials.attachment.properties';
    }

    public function render() {
        return view('media-library::components.media-library-attachment');
    }

    public function determineListViewName(): string {
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
        if (! is_null($this->listView)) {
            return $this->listView;
        }

<<<<<<< HEAD
        return 'media::livewire.partials.attachment.list';
    }

    public function determineItemViewName(): string
    {
=======
        return 'media-library::livewire.partials.attachment.list';
    }

    public function determineItemViewName(): string {
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
        if (! is_null($this->itemView)) {
            return $this->itemView;
        }

<<<<<<< HEAD
        return 'media::livewire.partials.attachment.item';
    }

    public function determineFieldsViewName(): string
    {
=======
        return 'media-library::livewire.partials.attachment.item';
    }

    public function determineFieldsViewName(): string {
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
        if (! is_null($this->fieldsView)) {
            return $this->fieldsView;
        }

<<<<<<< HEAD
        return 'media::livewire.partials.attachment.fields';
    }

    public function determineMaxItems(): ?int
    {
=======
        return 'media-library::livewire.partials.attachment.fields';
    }

    public function determineMaxItems(): ?int {
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
        return $this->multiple
            ? $this->maxItems
            : 1;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
