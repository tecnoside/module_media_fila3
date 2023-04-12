<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 931017b (Fix styling)
=======
>>>>>>> ecdd4cb (up)
declare(strict_types=1);

namespace Modules\Media\View\Components\Media;

use Illuminate\View\Component;
<<<<<<< HEAD
use Modules\Cms\Actions\GetViewAction;
use Modules\UI\Services\ThemeService;
=======
namespace Modules\Media\View\Components\Media;

use Illuminate\View\Component;
>>>>>>> a573407 (up)
=======
>>>>>>> ecdd4cb (up)

class Upload extends Component {
    public array $media;
<<<<<<< HEAD
    public string $tpl = 'v1';
=======
>>>>>>> a573407 (up)

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
<<<<<<< HEAD
        $this->propertiesView = $propertiesView ?? 'media::livewire.partials.attachment.properties';
        ThemeService::add('media::css/media.css');
=======
=======
>>>>>>> ecdd4cb (up)
        $this->propertiesView = $propertiesView ?? 'media-library::livewire.partials.attachment.properties';
>>>>>>> a573407 (up)
    }

<<<<<<< HEAD
    public function render()
    {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute($this->tpl);

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
=======
=======
    public function render() {
>>>>>>> 931017b (Fix styling)
        return view('media-library::components.media-library-attachment');
>>>>>>> a573407 (up)
    }

    public function determineListViewName(): string {
        if (! is_null($this->listView)) {
            return $this->listView;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        return 'media::livewire.partials.attachment.list';
=======
=======
>>>>>>> ecdd4cb (up)
        return 'media-library::livewire.partials.attachment.list';
>>>>>>> a573407 (up)
    }

    public function determineItemViewName(): string {
        if (! is_null($this->itemView)) {
            return $this->itemView;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        return 'media::livewire.partials.attachment.item';
=======
=======
>>>>>>> ecdd4cb (up)
        return 'media-library::livewire.partials.attachment.item';
>>>>>>> a573407 (up)
    }

    public function determineFieldsViewName(): string {
        if (! is_null($this->fieldsView)) {
            return $this->fieldsView;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        return 'media::livewire.partials.attachment.fields';
=======
=======
>>>>>>> ecdd4cb (up)
        return 'media-library::livewire.partials.attachment.fields';
>>>>>>> a573407 (up)
    }

    public function determineMaxItems(): ?int {
        return $this->multiple
            ? $this->maxItems
            : 1;
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a573407 (up)
=======
}
>>>>>>> 931017b (Fix styling)
=======
}
>>>>>>> ecdd4cb (up)
