<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Media\Models\Panels\Actions;

//-------- services --------

use Illuminate\Support\Facades\Http;
use Modules\Media\Jobs\DownloadVideo;
use Modules\Media\Models\Video;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

/**
 * Class PopulateVideoAction.
 */
class FillVideoFromDirectory extends XotBasePanelAction
{
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-file-import"></i>';

    /**
     * @return mixed
     */
    public function handle()
    {
//        $files=  array_diff(scandir(public_path('/snaps/' . $path_parts['filename'])), array('.', '..'));
        dddx('i am here');
    }
}
