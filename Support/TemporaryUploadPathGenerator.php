<?php

declare(strict_types=1);

namespace Modules\Media\Support;

use Modules\Media\Models\Media;

// use Spatie\MediaLibrary\MediaCollections\Models\Media;
// use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
// use Modules\Media\Contracts\PathGenerator;

class TemporaryUploadPathGenerator // implements PathGenerator
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
>>>>>>> 2f59e24c (.)
{
    public function getPath(Media $media): string
    {
        /* @phpstan-ignore-line */
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
{public function getPath(Media $media): string
{
    /* @phpstan-ignore-line */
    return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
}
>>>>>>> 771f698d (first)
=======
{
    public function getPath(Media $media): string
    {
        /* @phpstan-ignore-line */
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'original').'/';
    }
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
>>>>>>> 2f59e24c (.)

    public function getPathForConversions(Media $media): string
    {
        /* @phpstan-ignore-line */
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'conversion');
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        /* @phpstan-ignore-line */
        return $this->getBasePath($media).'/'.md5($media->id.$media->uuid.'responsive');
    }

    /*
    * Get a unique base path for the given media.
    */
    protected function getBasePath(Media $media): string
    {
        $prefix = config('media-library.prefix', '');

        $key = md5($media->uuid.$media->getKey());

<<<<<<< HEAD
<<<<<<< HEAD
        if ($prefix !== '') {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if ($prefix !== '') {
=======
        if ('' !== $prefix) {
>>>>>>> 771f698d (first)
=======
        if ($prefix !== '') {
>>>>>>> 7cc85766 (rebase 1)
=======
        if ($prefix !== '') {
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
        if ($prefix !== '') {
>>>>>>> 2f59e24c (.)
            return $prefix.'/'.$key;
        }

        return $key;
    }
}
