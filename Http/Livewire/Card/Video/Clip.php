<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Card\Video;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class Clip.
 */
class Clip extends Component {

    public string $type='edit';
    public  Model $model;

    /**
     * Undocumented function
     *
     * @param Model $clip
     * @return void
     */
    public function mount(Model $model) {
        $this->model=$model;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        $view = 'media::livewire.card.video.clip.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function editClip():void {
        dddx('a');
    }

}