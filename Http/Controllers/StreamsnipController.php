<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Media\Services\VideoStream;

/**
 * ---.
 */
class StreamsnipController extends Controller {
    /**
     * ---.
     */
    public function __invoke($media_id) {
        $media_class = \Modules\Media\Models\SpatieImage::class;
        $media = $media_class::find($media_id);
        $stream = new VideoStream($media->getPath());
        $stream->start();
    }
}
