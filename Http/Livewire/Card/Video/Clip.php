<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Card\Video;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Modules\Xot\Actions\GetViewAction;

/**
 * Class Clip.
 */
class Clip extends Component
{
    public string $tpl = 'edit';

    public Model $model;

    /**
     * Undocumented variable.
     *
     * @var array
     */
    /**
     * @var array<string, string>
     */
    protected $listeners = [
        'updateDataFromModal' => 'updateDataFromModal',
    ];

    /**
     * Undocumented function.
     */
    public function mount(Model $model): void
    {
        $this->model = $model;
    }

    /**
     * Undocumented function.
     */
    public function render(): View
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

    /**
     * Undocumented function.
     */
    public function editClip(): void
    {
        $data = $this->model->toArray();
        $this->dispatch('showModal', ['editClip', $data]);
    }

    /**
     * Undocumented function.
     */
    public function updateDataFromModal(string $id, array $data): void
    {
<<<<<<< HEAD
        if ($id !== 'editClip') {
=======
<<<<<<< HEAD
<<<<<<< HEAD
        if ($id !== 'editClip') {
=======
        if ('editClip' !== $id) {
>>>>>>> 771f698d (first)
=======
        if ($id !== 'editClip') {
>>>>>>> 7cc85766 (rebase 1)
>>>>>>> f1b3b202 (rebase 7)
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
