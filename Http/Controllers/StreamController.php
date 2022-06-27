<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Modules\Mediamonitor\Models\Press;
use Modules\Media\Services\VideoStream;

/**
 * ---.
 */
class StreamController extends Controller {
    /**
     * ---.
     * @return void
     */
    public function __invoke(int $press_id) {
        /**
         * @var class-string
         */
        $press_class = config('morph_map.press');
        if (null == $press_class) {
            throw new Exception('add media class to config morph_map');
        }
        $press = $press_class::find($press_id);
       
        // dddx($media->video_path);
        //$stream = new VideoStream($press->video_path);
        $stream = new VideoStream($press->file_mp4);
        $stream->start();
    }
}