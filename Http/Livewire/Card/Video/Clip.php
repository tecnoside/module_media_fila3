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

    protected $listeners=[
        'updateDataFromModal' => 'updateDataFromModal',
    ];

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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function editClip():void {
        $data=$this->model->toArray();
        $this->emit('showModal', 'editClip', $data);
    }

    /**
     * Undocumented function
     *
     * @param string $id
     * @param array $data
     * @return void
     */
    public function updateDataFromModal(string $id, array $data) {
        if($id!=='editClip'){
            return ;
        }
        
        $up=collect($data)
            ->only(['title','subtitle'])
            ->all();
        $this->model->update($up);
    }

}