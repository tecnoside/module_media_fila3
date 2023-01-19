<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Media\Actions\GetVideoFrameContentAction;



class MediaVideoImgController extends Controller
{
    public function getSecond($second)
    {
        $binaryImageContent = app(GetVideoFrameContentAction::class)->execute('cache', 'test.mp4', (int) $second);

        $res = Response::make(Image::cache(function ($image) use ($binaryImageContent) {
            $image = $image->make($binaryImageContent);
        }, 10))->header('Content-Type', 'image/jpeg');

        return $res;
    }
}
