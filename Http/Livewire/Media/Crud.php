<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Media;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\Media\Traits\WithMedia;

class Crud extends Component {
    use WithMedia;

    public $name;

    public $model = null;

    public $mediaComponentNames = ['upload'];

    public $upload;

    public $collection;

    public function mount(string $name, Model $model, string $collection) {
        $this->name = $name;
        $this->model = $model;
        $this->collection = $collection;
    }

    public function submit() {
        foreach ($this->upload as $attachment) {
            $url = storage_path("app/public".Str::between($attachment['previewUrl'], 'storage', 'conversions').$attachment['name']);

            $this->model
                ->addMedia($url)
                ->toMediaCollection($this->collection);
        }

        session()->flash('message', 'Post successfully updated.');
    }

    public function render() {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();

        return view($view);
    }
}
