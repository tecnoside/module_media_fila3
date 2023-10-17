<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Image;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Exception;
>>>>>>> 49d7c0c (first)
=======
use Exception;
>>>>>>> master
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
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> 49d7c0c (first)
=======
            throw new Exception('[' . __LINE__ . '][' . class_basename(self::class) . ']');
>>>>>>> master
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
        $img_canvas->save(public_path().'/'.$filenameOut, 100);
=======
        $img_canvas->save(public_path() . '/' . $filenameOut, 100);
>>>>>>> 49d7c0c (first)
=======
        $img_canvas->save(public_path() . '/' . $filenameOut, 100);
>>>>>>> master
    }
}
