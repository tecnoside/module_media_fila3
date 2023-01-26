<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Media\Actions\GetVideoFrameContentAction;

class MediaVideoImgController extends Controller
{
    public function getSecond($second)
    {
        $disk = 'cache';
        $file = 'test.mp4';
        $cache_key = Str::slug($disk.'-'.$file.'-'.$second);
        $bin = Cache::rememberForever($cache_key, function () use ($disk, $file, $second) {
            $binaryImageContent = app(GetVideoFrameContentAction::class)->execute($disk, $file, (int) $second);

            return $binaryImageContent;
        });
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
