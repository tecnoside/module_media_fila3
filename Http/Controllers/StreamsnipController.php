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
     *
     * @return void
     */
    public function __invoke(int $media_id) {
        try {
            $media_class = \Modules\Media\Models\SpatieImage::class;
            $media = $media_class::find($media_id);
            $stream = new VideoStream($media->getPath());
            $stream->start();
        }

        // catch exception
        catch (Exception $e) {
            dddx($e->getMessage());
        }
    }
}
