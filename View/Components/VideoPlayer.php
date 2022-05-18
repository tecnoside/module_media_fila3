<?php

declare(strict_types=1);

namespace Modules\Media\View\Components;

use Illuminate\View\Component;

/**
 * Class VideoPlayer.
 */
class VideoPlayer extends Component {
<<<<<<< HEAD
    public string $driver;
    public string $mp4Src;
    public int $currentTime;
=======
    public string $player;
    public string $mp4Src;
>>>>>>> 4757f34 (.)

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(string $mp4Src, int $currentTime, ?string $driver = null) {
        if (null == $driver) {
            $driver = config('xra.video.player');
        }
        $this->driver = $driver;
        $this->mp4Src = $mp4Src;
        $this->currentTime = $currentTime;
=======
    public function __construct(string $player, string $mp4Src) {
        $this->player = $player;
        $this->mp4Src = $mp4Src;
>>>>>>> 4757f34 (.)
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
<<<<<<< HEAD
        $view = 'media::components.video-player.'.$this->driver;
=======
        $view = 'media::components.video_player.'.$this->player;
>>>>>>> 4757f34 (.)
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
