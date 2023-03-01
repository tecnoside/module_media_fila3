<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Media\Models\Panels\Actions;

// -------- services --------

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\UI\Services\ThemeService;

// -------- bases -----------

/**
 * Class TestVideoEditorAction.
 */
class TestVideoEditorAction extends XotBasePanelAction {
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-vial"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        $video_players = [
            'plyr_io',
            // 'plyr_io.viola',
            'videojs',
            'videojs.v1',
            'videojs.vue',
            'jplayer',
            'mediaelement', // https://github.com/mediaelement/mediaelement
            'cloudinary_video_player', // https://github.com/cloudinary/cloudinary-video-player
            // 'afterglowplayer', //afterglowplayer.com Time to say goodbye.
        ];
        $i = request('i', 0);

        // $view = ThemeService::g1etView();
        $view = $this->panel->getView();

        $view_params = [
            'view' => $view,
            'mp4_src' => '/videos/test.mp4',  // public_html/videos/
            'players' => $video_players,
            'player' => $video_players[$i],
        ];

        return view($view, $view_params);
    }
}
