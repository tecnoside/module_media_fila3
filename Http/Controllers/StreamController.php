<?php
/**
 * @see https://code-pocket.info/20200624304/
 */

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Exception;
>>>>>>> 49d7c0c (first)
=======
use Exception;
>>>>>>> master
use Modules\Media\Services\VideoStream;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * ---.
 */
class StreamController extends BaseController
{
    /**
     * ---.
     */
    public function __invoke(int $press_id): StreamedResponse
    {
        $press_class = config('morph_map.press');
        if (null === $press_class) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \Exception('add media class to config morph_map');
=======
            throw new Exception('add media class to config morph_map');
>>>>>>> 49d7c0c (first)
=======
            throw new Exception('add media class to config morph_map');
>>>>>>> master
        }
        $press = $press_class::find($press_id);
        // $video_path=Storage::disk($press->disk)
        //    ->path($press->file_mp4);

        // if(!File::exists($video_path)){
        /*
        if(Storage::disk('media')->exists($press->file_mp4)){
            $press->disk='media';
            $press->save();
            $video_path=Storage::disk('media')
                ->path($press->file_mp4);
        }
        */
        // $press->delete();
        // }

        $videoStream = new VideoStream($press->disk, $press->file_mp4);

        return response()->stream(function () use ($videoStream): never {
            $videoStream->start();
        });
    }
}
