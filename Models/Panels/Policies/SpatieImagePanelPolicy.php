<?php
namespace Modules\Media\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Media\Models\Panels\Policies\SpatieImagePanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class SpatieImagePanelPolicy extends XotBasePanelPolicy {
}
