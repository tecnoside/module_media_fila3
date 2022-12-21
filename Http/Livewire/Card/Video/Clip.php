<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Card\Video;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
 * Class Clip.
 */
class Clip extends Component {
    public string $type = 'edit';
    public Model $model;

    /**
     * Undocumented variable.
     *
     * @var array
     */
    protected $listeners = [
        'updateDataFromModal' => 'updateDataFromModal',
    ];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(Model $model) {
        $this->model = $model;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'media::livewire.card.video.clip.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * Undocumented function.
     */
    public function editClip(): void {
        $data = $this->model->toArray();
        $this->emit('showModal', 'editClip', $data);
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function updateDataFromModal(string $id, array $data) {
        if ('editClip' !== $id) {
            return;
        }
        if ($data['id'] !== $this->model->getKey()) {
            return;
        }
        // dddx(['data'=>$data,'model'=>$this->model]);

        $up = collect($data)
            ->only(['title', 'subtitle'])
            ->all();
        // dddx($up);
        $this->model->update($up);
        $this->model->refresh();
    }
}
