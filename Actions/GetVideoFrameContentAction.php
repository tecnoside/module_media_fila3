<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Exception;
>>>>>>> 49d7c0c (first)
=======
use Exception;
>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use Exception;
>>>>>>> 0d0c96c (Dusting)
=======
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use Exception;
>>>>>>> ca4973d (Dusting)
=======
>>>>>>> 93f1e9f (Check & fix styling)
=======
use Exception;
>>>>>>> cafc8d1 (Dusting)
=======
>>>>>>> c47cbe6 (Check & fix styling)
=======
use Exception;
>>>>>>> 214f9b0 (Dusting)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $cache_key = Str::slug($disk_mp4.' '.$file_mp4.' '.$time.' 1');
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> 49d7c0c (first)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> master
=======
        $cache_key = Str::slug($disk_mp4.' '.$file_mp4.' '.$time.' 1');
>>>>>>> ed2c51e (Check & fix styling)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> 0d0c96c (Dusting)
=======
        $cache_key = Str::slug($disk_mp4.' '.$file_mp4.' '.$time.' 1');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> ca4973d (Dusting)
=======
        $cache_key = Str::slug($disk_mp4.' '.$file_mp4.' '.$time.' 1');
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> cafc8d1 (Dusting)
=======
        $cache_key = Str::slug($disk_mp4.' '.$file_mp4.' '.$time.' 1');
>>>>>>> c47cbe6 (Check & fix styling)
=======
        $cache_key = Str::slug($disk_mp4 . ' ' . $file_mp4 . ' ' . $time . ' 1');
>>>>>>> 214f9b0 (Dusting)

        return Cache::store('file')->remember(
            $cache_key,
            $seconds,
            function () use ($disk_mp4, $file_mp4, $time) {
                try {
                    return FFMpeg::fromDisk($disk_mp4)
                        ->open($file_mp4)
                        ->getFrameFromSeconds($time)
                        ->export()
                        ->getFrameContents();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                } catch (\Exception) {
=======
                } catch (Exception) {
>>>>>>> 49d7c0c (first)
=======
                } catch (Exception) {
>>>>>>> master
=======
                } catch (\Exception) {
>>>>>>> ed2c51e (Check & fix styling)
=======
                } catch (Exception) {
>>>>>>> 0d0c96c (Dusting)
=======
                } catch (\Exception) {
>>>>>>> a4cf9d3 (Check & fix styling)
=======
                } catch (Exception) {
>>>>>>> ca4973d (Dusting)
=======
                } catch (\Exception) {
>>>>>>> 93f1e9f (Check & fix styling)
=======
                } catch (Exception) {
>>>>>>> cafc8d1 (Dusting)
=======
                } catch (\Exception) {
>>>>>>> c47cbe6 (Check & fix styling)
=======
                } catch (Exception) {
>>>>>>> 214f9b0 (Dusting)
                    return Storage::disk('public_html')->get('img/video_not_exists.jpg');
                }
            }
        );
    }
}
