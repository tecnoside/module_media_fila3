<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Media\Models\Panels\Actions;

// -------- services --------

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\UI\Services\ThemeService;

// -------- bases -----------

/**
 * Class TryVideoEditorSubAction.
 */
class TryVideoEditorSubAction extends XotBasePanelAction {
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-photo-video"></i><i class="fas fa-pen"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        $view = ThemeService::getView();

        $view_params = [
            'view' => $view,
            'mp4_src' => '/videos/test.mp4',
            'srt_src' => '/videos/test.xml',
        ];

        return view()->make($view, $view_params);
    }
}
