<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions;

use Modules\Media\Models\Media;
use Modules\Media\Models\TemporaryUpload;
use Spatie\MediaLibrary\HasMedia;
use Spatie\QueueableAction\QueueableAction;

class AttachMediaAction
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
     */
    public function execute(HasMedia $hasMedia, array $attachments, string $collection = null): void
    {
        $order = 1;
        foreach ($attachments as $attachment) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ++$order;
=======
            $order++;
>>>>>>> 49d7c0c (first)
=======
            $order++;
>>>>>>> master
=======
            ++$order;
>>>>>>> ed2c51e (Check & fix styling)
=======
            $order++;
>>>>>>> 0d0c96c (Dusting)
=======
            ++$order;
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            $order++;
>>>>>>> ca4973d (Dusting)
=======
            ++$order;
>>>>>>> 93f1e9f (Check & fix styling)
=======
            $order++;
>>>>>>> cafc8d1 (Dusting)
            $temporaryUpload = TemporaryUpload::findByMediaUuidInCurrentSession($attachment['uuid']);

            if ($temporaryUpload instanceof TemporaryUpload) {
                // $media = $temporaryUpload->getFirstMedia();
                $media = $temporaryUpload->moveMedia($hasMedia, $collection, '', $attachment['fileName']);
                // dddx($res);
                // $media->move($this->model, $this->collection);
            } else {
                $media = Media::findByUuid($attachment['uuid']);
                // $media->update(['order_column'=>$order]);
                // dddx(['media'=>$media,'order'=>$order]);
            }

            $media?->update(['order_column' => $order, 'custom_properties' => $attachment['custom_properties'] ?? []]);
        }
    }
}
