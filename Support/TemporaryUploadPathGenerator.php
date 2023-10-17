<?php

declare(strict_types=1);

namespace Modules\Media\Support;

use Modules\Media\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class TemporaryUploadPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'original') . '/';
>>>>>>> 49d7c0c (first)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'original') . '/';
>>>>>>> master
    }

    public function getPathForConversions(Media $media): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'conversion');
>>>>>>> 49d7c0c (first)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'conversion');
>>>>>>> master
    }

    public function getPathForResponsiveImages(Media $media): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'responsive');
>>>>>>> 49d7c0c (first)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'responsive');
>>>>>>> master
    }

    /*
    * Get a unique base path for the given media.
    */
    protected function getBasePath(Media $media): string
    {
        $prefix = config('media-library.prefix', '');

<<<<<<< HEAD
<<<<<<< HEAD
        $key = md5($media->uuid.$media->getKey());

        if ('' !== $prefix) {
            return $prefix.'/'.$key;
=======
        $key = md5($media->uuid . $media->getKey());

        if ('' !== $prefix) {
            return $prefix . '/' . $key;
>>>>>>> 49d7c0c (first)
=======
        $key = md5($media->uuid . $media->getKey());

        if ('' !== $prefix) {
            return $prefix . '/' . $key;
>>>>>>> master
        }

        return $key;
    }
}
