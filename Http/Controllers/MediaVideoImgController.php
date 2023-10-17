<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Media\Actions\GetVideoFrameContentAction;
use Psr\Http\Message\ResponseInterface;

class MediaVideoImgController extends Controller
{
    /**
     * @return ResponseInterface
     */
    public function getSecond(int $second)
    {
        $disk = 'cache';
        $file = 'test.mp4';
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
        $cache_key = Str::slug($disk.'-'.$file.'-'.$second);
=======
        $cache_key = Str::slug($disk . '-' . $file . '-' . $second);
>>>>>>> 49d7c0c (first)
=======
        $cache_key = Str::slug($disk . '-' . $file . '-' . $second);
>>>>>>> master
=======
        $cache_key = Str::slug($disk.'-'.$file.'-'.$second);
>>>>>>> ed2c51e (Check & fix styling)
=======
        $cache_key = Str::slug($disk . '-' . $file . '-' . $second);
>>>>>>> 0d0c96c (Dusting)
=======
        $cache_key = Str::slug($disk.'-'.$file.'-'.$second);
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $cache_key = Str::slug($disk . '-' . $file . '-' . $second);
>>>>>>> ca4973d (Dusting)
=======
        $cache_key = Str::slug($disk.'-'.$file.'-'.$second);
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $cache_key = Str::slug($disk . '-' . $file . '-' . $second);
>>>>>>> cafc8d1 (Dusting)
=======
        $cache_key = Str::slug($disk.'-'.$file.'-'.$second);
>>>>>>> c47cbe6 (Check & fix styling)
=======
        $cache_key = Str::slug($disk . '-' . $file . '-' . $second);
>>>>>>> 214f9b0 (Dusting)
        $bin = Cache::rememberForever($cache_key, fn () => app(GetVideoFrameContentAction::class)->execute($disk, $file, $second));
        /*
        $res = Response::make(Image::cache(function ($image) use ($binaryImageContent) {
            $image = $image->make($binaryImageContent);
        }, 10))->header('Content-Type', 'image/jpeg');

        return $res;
        */
        // return Image::make($binaryImageContent)->stream('jpg', 60);

        return Image::make($bin)->psrResponse('jpg', 60);
    }
}
