<?php

declare(strict_types=1);

namespace Modules\Media\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Xot\Actions\GetViewAction;
use Webmozart\Assert\Assert;

/**
 * Class VideoPlayer.
 */
class VideoPlayer extends Component
{
    public string $driver;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(public string $mp4Src, public int $currentTime, ?string $driver = null)
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(public string $mp4Src, public int $currentTime, ?string $driver = null)
=======
    public function __construct(public string $mp4Src, public int $currentTime, string $driver = null)
>>>>>>> 771f698d (first)
=======
    public function __construct(public string $mp4Src, public int $currentTime, ?string $driver = null)
>>>>>>> 7cc85766 (rebase 1)
=======
    public function __construct(public string $mp4Src, public int $currentTime, ?string $driver = null)
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    {
        Assert::string($driver ??= config('xra.video.player'));

        $this->driver = $driver;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        /**
         * @phpstan-var view-string
         */
        // $view = 'media::components.video-player.'.$this->driver;
        $view = app(GetViewAction::class)->execute($this->driver);

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
