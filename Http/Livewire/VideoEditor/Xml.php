<?php

declare(strict_types=1);
/**
 * ---.
 */

namespace Modules\Media\Http\Livewire\VideoEditor;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Mediamonitor\Contracts\MediaContract;

class Xml extends Component {
    public MediaContract $model;
    // public Collection $subtitles;
    // public string $subtitles_html;
    public ?float $sub_start = null;
    public ?float $sub_end = null;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $listeners = [
        'setSubRange' => 'setSubRange',
    ];

    /**
     * @return void
     */
    public function mount(MediaContract $model) {
        $this->model = $model;
        // $this->subtitles = $model->subtitles;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'media::livewire.video-editor.xml';
        $view_params = [
            'view' => $view,
            'subtitles_html' => $this->model->html,
        ];

        return view()->make($view, $view_params);
    }

    public function setSlider(): void {
        // $this->emitTo('theme::input.slider', 'setSliderValues', [$this->sub_start,  $this->sub_end]);
        $this->emit('setSliderValues', [$this->sub_start,  $this->sub_end]);
    }

    /**
     * Undocumented function
     *
     * @param float|null $start
     * @param float|null $end
     * @return void
     */
    public function setSubRange(?float $start, ?float $end) {
        // dddx(['start'=>$start,'end'=>$end]);
        if (null !== $start) {
            $this->sub_start = $start;
        }
        if (null !== $end) {
            $this->sub_end = $end;
        }
    }
}