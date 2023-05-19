<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions;

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
     *
     * @return void
     */
    public function execute(HasMedia $model, array $attachments, ?string $collection = null)
    {
        $order = 1;
        foreach ($attachments as $attachment) {
            ++$order;
            $temporaryUpload = TemporaryUpload::findByMediaUuidInCurrentSession($attachment['uuid']);
            if (null != $temporaryUpload) {
                // $media = $temporaryUpload->getFirstMedia();
                $media = $temporaryUpload->moveMedia($model, $collection, '', $attachment['fileName']);
                // dddx($res);
                // $media->move($this->model, $this->collection);
            } else {
                $media = \Modules\Media\Models\Media::findByUuid($attachment['uuid']);
                // $media->update(['order_column'=>$order]);
                // dddx(['media'=>$media,'order'=>$order]);
            }
            foreach ($attachment['custom_properties'] as $k => $v) {
                $media?->setCustomProperty($k, $v);
            }

            $media?->update(['order_column' => $order]);
        }
    }
}
