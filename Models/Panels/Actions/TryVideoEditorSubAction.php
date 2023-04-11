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
class TryVideoEditorSubAction extends XotBasePanelAction
{
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-photo-video"></i><i class="fas fa-pen"></i>';

    /**
     * @return mixed
     */
    public function handle()
    {
        // $view = ThemeService::g1etView();
        $view = $this->panel->getView();

        $view_params = [
            'view' => $view,
            'mp4_src' => '/videos/test.mp4',
            'srt_src' => '/videos/test.xml',
        ];

        return view($view, $view_params);
    }
}
