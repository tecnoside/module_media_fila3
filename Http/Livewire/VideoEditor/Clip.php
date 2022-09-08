<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\VideoEditor;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Clip.
 */
class Clip extends Component {
    public string $type = 'edit';

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'media::livewire.video-editor.clip.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
