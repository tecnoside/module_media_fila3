<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Xot\Contracts\UserContract;

class VideoPanelPolicy extends XotBasePanelPolicy {
    public function downloadVideo(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
