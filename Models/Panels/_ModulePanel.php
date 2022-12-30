<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels;

use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class _ModulePanel.
 */
class _ModulePanel extends XotBasePanel {
    public function actions(): array {
        return [
            //new Actions\TestVideoPlayerAction(),
            //new Actions\TestVideoEditorAction(),
            //new Actions\PopulateVideoAction(),
            // new Actions\TestStreamingAction(),
            //new Actions\FillVideoFromDirectory(),
            //new Actions\TryVideoEditorSubAction(),
            //new Actions\TryStreamAction(),
        ];
    }
}
