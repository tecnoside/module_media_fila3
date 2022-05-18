<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Media\Models\Panels\Actions;

<<<<<<< HEAD
// -------- services --------
=======
//-------- services --------
>>>>>>> 4757f34 (.)

use FFMpeg\Coordinate\Dimension;
use FFMpeg\Coordinate\TimeCode;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

<<<<<<< HEAD
// -------- bases -----------
=======
//-------- bases -----------
>>>>>>> 4757f34 (.)

/**
 * Class TestAction.
 */
class TestVideoEditorAction extends XotBasePanelAction {
    public bool $onItem = true;
<<<<<<< HEAD
    public string $icon = '<i class="fas fa-photo-video"></i><i class="fas fa-pen"></i>';
=======
    public string $icon = '<i class="fas fa-vial"></i>';
>>>>>>> 4757f34 (.)

    /**
     * @return mixed
     */
    public function handle() {
        $drivers = [
            'custom.v1',
            'custom.v2',
<<<<<<< HEAD
            'custom.v3',
            'custom.bool',
=======
>>>>>>> 4757f34 (.)
        ];
        $i = request('i', 0);

        $view = ThemeService::getView();

        $view_params = [
            'view' => $view,
<<<<<<< HEAD
            'mp4_src' => '/videos/test.mp4',  // public_html/videos/
=======
            'mp4_src' => '/videos/test.mp4',  //public_html/videos/
>>>>>>> 4757f34 (.)
            'drivers' => $drivers,
            'driver' => $drivers[$i],
        ];

        return view()->make($view, $view_params);
    }

    public function postHandle() {
        $data = request()->all();

        $start = 5;
        $to = 15;

        FFMpeg::fromDisk('public_html')
        ->open('videos/test.mp4')

    // add the 'resize' filter...
<<<<<<< HEAD
        // ->addFilter(function ($filters) {
        //    $filters->resize(new Dimension(60, 40));
        // })
=======
        //->addFilter(function ($filters) {
        //    $filters->resize(new Dimension(60, 40));
        //})
>>>>>>> 4757f34 (.)
        ->addFilter('-ss', TimeCode::fromSeconds($start))
        ->addFilter('-to', TimeCode::fromSeconds($to))

    // call the 'export' method...
        ->export()

    // tell the MediaExporter to which disk and in which format we want to export...
<<<<<<< HEAD
        // ->toDisk('downloadable_videos')
=======
        //->toDisk('downloadable_videos')
>>>>>>> 4757f34 (.)
        ->save('videos/zibibbo.mp4');
    }
}
