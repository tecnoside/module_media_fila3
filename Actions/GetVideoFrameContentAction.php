<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;

class GetVideoFrameContentAction
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return string|null
     */
    public function execute(string $disk_mp4, string $file_mp4, int $time)
    {
        if (! Storage::disk($disk_mp4)->exists($file_mp4)) {
            return '';
        }
        $seconds = 3600;
        $cache_key = Str::slug($disk_mp4.' '.$file_mp4.' '.$time.' 1');
        $res = Cache::store('file')->remember(
            $cache_key,
            $seconds,
            function () use ($disk_mp4, $file_mp4, $time) {
                try {
                    return FFMpeg::fromDisk($disk_mp4)
                        ->open($file_mp4)
                        ->getFrameFromSeconds($time)
                        ->export()
                        ->getFrameContents();
                } catch (\Exception $e) {
                    return Storage::disk('public_html')->get('img/video_not_exists.jpg');
                }
            }
        );

        return $res;
    }
}
