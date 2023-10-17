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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'original') . '/';
>>>>>>> 49d7c0c (first)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'original') . '/';
>>>>>>> master
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
>>>>>>> ed2c51e (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'original') . '/';
>>>>>>> 0d0c96c (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'original') . '/';
>>>>>>> ca4973d (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
>>>>>>> 93f1e9f (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'original') . '/';
>>>>>>> cafc8d1 (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
>>>>>>> c47cbe6 (Check & fix styling)
    }

    public function getPathForConversions(Media $media): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'conversion');
>>>>>>> 49d7c0c (first)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'conversion');
>>>>>>> master
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
>>>>>>> ed2c51e (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'conversion');
>>>>>>> 0d0c96c (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'conversion');
>>>>>>> ca4973d (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
>>>>>>> 93f1e9f (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'conversion');
>>>>>>> cafc8d1 (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
>>>>>>> c47cbe6 (Check & fix styling)
    }

    public function getPathForResponsiveImages(Media $media): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'responsive');
>>>>>>> 49d7c0c (first)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'responsive');
>>>>>>> master
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
>>>>>>> ed2c51e (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'responsive');
>>>>>>> 0d0c96c (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'responsive');
>>>>>>> ca4973d (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
>>>>>>> 93f1e9f (Check & fix styling)
=======
        return $this->getBasePath($media) . '/' . md5($media->id . $media->uuid . 'responsive');
>>>>>>> cafc8d1 (Dusting)
=======
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
>>>>>>> c47cbe6 (Check & fix styling)
    }

    /*
    * Get a unique base path for the given media.
    */
    protected function getBasePath(Media $media): string
    {
        $prefix = config('media-library.prefix', '');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
        $key = md5($media->uuid.$media->getKey());

        if ('' !== $prefix) {
            return $prefix.'/'.$key;
>>>>>>> ed2c51e (Check & fix styling)
=======
        $key = md5($media->uuid . $media->getKey());

        if ('' !== $prefix) {
            return $prefix . '/' . $key;
>>>>>>> 0d0c96c (Dusting)
=======
        $key = md5($media->uuid.$media->getKey());

        if ('' !== $prefix) {
            return $prefix.'/'.$key;
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $key = md5($media->uuid . $media->getKey());

        if ('' !== $prefix) {
            return $prefix . '/' . $key;
>>>>>>> ca4973d (Dusting)
=======
        $key = md5($media->uuid.$media->getKey());

        if ('' !== $prefix) {
            return $prefix.'/'.$key;
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $key = md5($media->uuid . $media->getKey());

        if ('' !== $prefix) {
            return $prefix . '/' . $key;
>>>>>>> cafc8d1 (Dusting)
=======
        $key = md5($media->uuid.$media->getKey());

        if ('' !== $prefix) {
            return $prefix.'/'.$key;
>>>>>>> c47cbe6 (Check & fix styling)
        }

        return $key;
    }
}
