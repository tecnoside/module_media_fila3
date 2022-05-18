<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels;

use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class _ModulePanel.
 */
class _ModulePanel extends XotBasePanel {
    public function actions(): array {
        return [
<<<<<<< HEAD
            new Actions\TestVideoPlayerAction(),
            new Actions\TestVideoEditorAction(),
            new Actions\PopulateVideoAction(),
            new Actions\TestStreamingAction(),
            new Actions\FillVideoFromDirectory(),
            new Actions\TryVideoEditorSubAction(),
            new Actions\TryStreamAction(),
=======
            new Actions\TestVideoAction(),
            new Actions\TestVideoEditorAction(),
>>>>>>> 4757f34 (.)
        ];
    }
}
