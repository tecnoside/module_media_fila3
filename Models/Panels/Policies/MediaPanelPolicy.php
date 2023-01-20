<?php
namespace Modules\Media\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Media\Models\Panels\Policies\MediaPanelPolicy as Post; 

use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;

class MediaPanelPolicy extends XotBasePanelPolicy {
}
