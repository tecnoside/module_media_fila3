<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Media;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CustomProperty extends Component implements HasForms
{
    use InteractsWithForms;

    public string $attributeName;
    public Media $media;

    public function mount(Media $media, string $attributeName = 'description'): void
    {
        $this->media = $media;
        $this->attributeName = $attributeName;
        $value = $this->media->getCustomProperty($attributeName);
        $this->form->fill([
            $this->attributeName => $value,
        ]);
    }

    public function render()
    {
        /**
         * @phpstan-var view-string
         */
        // $view = app(GetViewAction::class)->execute();
        $view = 'media::livewire.media.custom-property';

        return view($view);
    }

    protected function getFormSchema(): array
    {
        return [
            Textarea::make($this->attributeName)
                ->label('')
                // ->reactive()
                ->lazy()
                ->afterStateUpdated(function ($state): void {
                    $this->media->setCustomProperty($this->attributeName, $state);
                    $this->media->save();
                }),
            // ...
        ];
    }
}
