<?php

declare(strict_types=1);

namespace Modules\Media\View\Components\Media;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Cms\Actions\GetViewAction;

class Button extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        // $view = 'media::components.media.button';
        $view = app(GetViewAction::class)->execute();
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
