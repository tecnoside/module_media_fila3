<?php

declare(strict_types=1);

namespace Modules\Media\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
// andrebbe messo PressContract
use Modules\Mediamonitor\Models\Press;

class Clip extends Component {
    public Press $clip;
    public string $type;

    /**
     * Create the component instance.
     *
     * @param string $type
     * @param string $message
     *
     * @return void
     */
    public function __construct(Press $clip, ?string $type = 'v1') {
        $this->clip = $clip;
        $this->type = $type;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'media::components.card.press.clip.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
