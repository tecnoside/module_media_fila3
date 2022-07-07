<?php
/**
 * @link https://code-pocket.info/20200624304/
 */

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Modules\Mediamonitor\Models\Press;
use Illuminate\Support\Facades\Storage;
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
        $video_path=Storage::disk($press->disk)
            ->path($press->file_mp4);
        
        if(!File::exists($video_path)){
            if(Storage::disk('media')->exists($press->file_mp4)){
                $press->disk='media';
                $press->save();
                $video_path=Storage::disk('media')
                    ->path($press->file_mp4);
            }
        }
        
        $stream = new VideoStream($press->disk,$press->file_mp4);
        $stream->start();
    }
}