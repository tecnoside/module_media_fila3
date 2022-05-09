<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class VideoPanelPolicy extends XotBasePanelPolicy {
    public function downloadVideo(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
