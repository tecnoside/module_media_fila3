<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Image;

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
use Intervention\Image\Facades\Image;
use Spatie\QueueableAction\QueueableAction;

class Merge
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

    public function execute(array $filenames, string $filenameOut): void
    {
        $width = 0;
        $height = 0;
        $imgs = [];
        foreach ($filenames as $filename) {
            $img = Image::make(public_path($filename));
            $imgs[] = $img;
            $width += $img->width();
            $height = max($height, $img->height());
        }

        if (! is_numeric($width) || ! is_numeric($height)) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> 49d7c0c (first)
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> master
=======
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
>>>>>>> ed2c51e (Check & fix styling)
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> 0d0c96c (Dusting)
=======
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> ca4973d (Dusting)
=======
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
>>>>>>> 93f1e9f (Check & fix styling)
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> cafc8d1 (Dusting)
=======
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
>>>>>>> c47cbe6 (Check & fix styling)
        }

        $width = (int) $width;
        $height = (int) $height;
        $img_canvas = Image::canvas($width, $height);
        $delta = 0;
        foreach ($imgs as $img) {
            $img_canvas->insert($img, 'top-left ', $delta, 0);
            $delta += $img->width();
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $img_canvas->save(public_path().'/'.$filenameOut, 100);
=======
        $img_canvas->save(public_path() . '/' . $filenameOut, 100);
>>>>>>> 49d7c0c (first)
=======
        $img_canvas->save(public_path() . '/' . $filenameOut, 100);
>>>>>>> master
=======
        $img_canvas->save(public_path().'/'.$filenameOut, 100);
>>>>>>> ed2c51e (Check & fix styling)
=======
        $img_canvas->save(public_path() . '/' . $filenameOut, 100);
>>>>>>> 0d0c96c (Dusting)
=======
        $img_canvas->save(public_path().'/'.$filenameOut, 100);
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $img_canvas->save(public_path() . '/' . $filenameOut, 100);
>>>>>>> ca4973d (Dusting)
=======
        $img_canvas->save(public_path().'/'.$filenameOut, 100);
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $img_canvas->save(public_path() . '/' . $filenameOut, 100);
>>>>>>> cafc8d1 (Dusting)
=======
        $img_canvas->save(public_path().'/'.$filenameOut, 100);
>>>>>>> c47cbe6 (Check & fix styling)
    }
}
