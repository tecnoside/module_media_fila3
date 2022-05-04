<?php

declare(strict_types=1);
/**
 * ---.
 */

namespace Modules\Media\Http\Livewire\VideoEditor;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\Component;

class Xml extends Component {
    public Model $model;
    //public Collection $subtitles;
    //public string $subtitles_html;
    public ?float $sub_start = null;
    public ?float $sub_end = null;

    protected $listeners = [
        'setSubRange' => 'setSubRange',
    ];

    /**
     * @return void
     */
    public function mount(Model $model) {
        $this->model = $model;
        //$this->subtitles_html=$model->getSubtitlesHtml();
        //$this->subtitles = $model->subtitles;
    }

    public function render(): Renderable {
        $view = 'media::livewire.video-editor.xml';
        $view_params = [
            'view' => $view,
            'subtitles_html' => $this->model->getSubtitlesHtml(),
        ];

        return view()->make($view, $view_params);
    }

    public function setSlider(): void {
        //$this->emitTo('theme::input.slider', 'setSliderValues', [$this->sub_start,  $this->sub_end]);
        $this->emit('setSliderValues', [$this->sub_start,  $this->sub_end]);
    }

    public function setSubRange(?float $start, ?float $end) {
        //dddx(['start'=>$start,'end'=>$end]);
        if (null !== $start) {
            $this->sub_start = $start;
        }
        if (null !== $end) {
            $this->sub_end = $end;
        }
    }
}
