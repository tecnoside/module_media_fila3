<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Modules\Media\Services\VideoStream;

/**
 * ---.
 */
class StreamController extends Controller {
    /**
     * ---.
     * @return void
     */
    public function __invoke($media_id) {
        $media_class = config('morph_map.media');
        if (null == $media_class) {
            throw new Exception('add media class to config morph_map');
        }
        $media = $media_class::find($media_id);
        // dddx($media->video_path);
        $stream = new VideoStream($media->video_path);
        $stream->start();
    }
}