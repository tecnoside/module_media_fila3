<?php

declare(strict_types=1);

namespace Modules\Media\View\Components\Media;

use Illuminate\View\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\UI\Services\ThemeService;

class Upload extends Component
{
    public array $media;
    public string $tpl = 'v1';

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
        $this->propertiesView = $propertiesView ?? 'media::livewire.partials.attachment.properties';
        ThemeService::add('media::css/media.css');
    }

    public function render()
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute($this->tpl);

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function determineListViewName(): string
    {
        if (! is_null($this->listView)) {
            return $this->listView;
        }

        return 'media::livewire.partials.attachment.list';
    }

    public function determineItemViewName(): string
    {
        if (! is_null($this->itemView)) {
            return $this->itemView;
        }

        return 'media::livewire.partials.attachment.item';
    }

    public function determineFieldsViewName(): string
    {
        if (! is_null($this->fieldsView)) {
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
