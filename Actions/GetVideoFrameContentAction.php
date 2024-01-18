<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
=======
>>>>>>> 771f698d (first)
=======
use Exception;
>>>>>>> 7cc85766 (rebase 1)
=======
use Exception;
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
use Exception;
>>>>>>> 2f59e24c (.)
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;

class GetVideoFrameContentAction
{
    use QueueableAction;

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

<<<<<<< HEAD
<<<<<<< HEAD
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
=======
        $cache_key = Str::slug($disk_mp4.' '.$file_mp4.' '.$time.' 1');
>>>>>>> 771f698d (first)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> 7cc85766 (rebase 1)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> 2f59e24c (.)

        return Cache::store('file')->remember(
            $cache_key,
            $seconds,
            static function () use ($disk_mp4, $file_mp4, $time) {
                try {
                    return FFMpeg::fromDisk($disk_mp4)
                        ->open($file_mp4)
                        ->getFrameFromSeconds($time)
                        ->export()
                        ->getFrameContents();
<<<<<<< HEAD
<<<<<<< HEAD
                } catch (Exception) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                } catch (Exception) {
=======
                } catch (\Exception) {
>>>>>>> 771f698d (first)
=======
                } catch (Exception) {
>>>>>>> 7cc85766 (rebase 1)
=======
                } catch (Exception) {
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
                } catch (Exception) {
>>>>>>> 2f59e24c (.)
                    return Storage::disk('public_html')->get('img/video_not_exists.jpg');
                }
            }
        );
    }
}
