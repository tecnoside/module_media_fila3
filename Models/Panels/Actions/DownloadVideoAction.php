<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Media\Models\Panels\Actions;

// -------- services --------

use Modules\Media\Jobs\DownloadVideo;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

// -------- bases -----------

/**
 * Class PopulateVideoAction.
 */
class DownloadVideoAction extends XotBasePanelAction {
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-file-import"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        /**
         * @var \Modules\Media\Models\Video
         */
        $video = $this->row;
        DownloadVideo::dispatch($video);
    }
}
