<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels\Policies;

use Modules\LU\Services\ProfileService;
use Modules\Xot\Contracts\UserContract;
use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPermissionPolicy;

class MediaPanelPolicy extends XotBasePanelPermissionPolicy
{
    /*
    public function index(?UserContract $user, PanelContract $panel): bool {
        return ProfileService::make()->get($user)->hasPermissionTo($panel->getPath().'-'.__FUNCTION__);
    }

    public function show(?UserContract $user, PanelContract $panel): bool {
        return ProfileService::make()->get($user)->hasPermissionTo($panel->getPath().'-'.__FUNCTION__);
    }
    */
}
