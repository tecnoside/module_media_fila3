<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPermissionPolicy;
use Modules\User\Services\ProfileService;
use Modules\Xot\Contracts\UserContract;

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
