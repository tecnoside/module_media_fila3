<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Media;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class Crud extends Component
{
    //use WithMedia;

    public $name;

    public $model = null;

    public $mediaComponentNames = ['images'];

    public $collection;

    public function mount(string $name, Model $model, string $collection)
    {
        $this->name = $name;
        $this->model = $model;
        $this->collection = $collection;
    }

    public function submit()
    {
        /*$formSubmission = BlogPost::create([
            'name' => $this->name,
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($this->images)
            ->toMediaCollection('images');

        $this->message = 'Your form has been submitted';*/
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