<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Media;

use Livewire\Component;
use Illuminate\Support\Str;
use Modules\Media\Traits\WithMedia;
use Illuminate\Database\Eloquent\Model;

class Crud extends Component
{
    use WithMedia;

    public $name;

    public $model = null;

    public $mediaComponentNames = ['upload'];

    public $upload;

    public $collection;

    public function mount(string $name, Model $model, string $collection)
    {
        $this->name = $name;
        $this->model = $model;
        $this->collection = $collection;
    }

    public function submit()
    {
        foreach($this->upload as $attachment)
        {
            $url = Str::before($attachment['previewUrl'], 'conversions').$attachment['name'];

            dddx($url);

            $this->model
                ->addMedia($attachment)
                ->toMediaCollection($this->collection);
        }

        session()->flash('message', 'Post successfully updated.');
    }

    public function render()
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'media::livewire.media.crud';

        return view($view);
    }
}