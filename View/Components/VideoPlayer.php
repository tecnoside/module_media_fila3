<?php

declare(strict_types=1);

namespace Modules\Media\View\Components;

use Illuminate\View\Component;

/**
 * Class VideoPlayer.
 */
class VideoPlayer extends Component {
    public string $driver;
    public string $mp4Src;
    public int $currentTime;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $mp4Src, int $currentTime, ?string $driver = null) {
        if (null == $driver) {
            $driver = config('xra.video.player');
        }
        $this->driver = $driver;
        $this->mp4Src = $mp4Src;
        $this->currentTime = $currentTime;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        $view = 'media::components.video-player.'.$this->driver;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
