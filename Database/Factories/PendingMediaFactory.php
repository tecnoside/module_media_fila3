<?php

declare(strict_types=1);

namespace Modules\Media\Database\Factories;

use Modules\Media\Dto\PendingMediaItem;

class PendingMediaFactory
{
    protected array $temporaryUploadAttributes = [];

    public function withTemporaryUploadAttributes(array $temporaryUploadAttributes = []): self
    {
        $this->temporaryUploadAttributes = $temporaryUploadAttributes;

        return $this;
    }

    public function create(array $attributes = []): PendingMediaItem
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $temporaryUpload = (new TemporaryUploadFactory())->create($this->temporaryUploadAttributes);
=======
        $temporaryUpload = (new TemporaryUploadFactory)->create($this->temporaryUploadAttributes);
>>>>>>> 49d7c0c (first)
=======
        $temporaryUpload = (new TemporaryUploadFactory)->create($this->temporaryUploadAttributes);
>>>>>>> master
=======
        $temporaryUpload = (new TemporaryUploadFactory())->create($this->temporaryUploadAttributes);
>>>>>>> ed2c51e (Check & fix styling)
=======
        $temporaryUpload = (new TemporaryUploadFactory)->create($this->temporaryUploadAttributes);
>>>>>>> 0d0c96c (Dusting)
=======
        $temporaryUpload = (new TemporaryUploadFactory())->create($this->temporaryUploadAttributes);
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $temporaryUpload = (new TemporaryUploadFactory)->create($this->temporaryUploadAttributes);
>>>>>>> ca4973d (Dusting)
=======
        $temporaryUpload = (new TemporaryUploadFactory())->create($this->temporaryUploadAttributes);
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $temporaryUpload = (new TemporaryUploadFactory)->create($this->temporaryUploadAttributes);
>>>>>>> cafc8d1 (Dusting)

        return new PendingMediaItem(
            $temporaryUpload->getFirstMedia()->uuid,
            $attributes['name'] ?? 'name',
            $attributes['order'] ?? 0,
            $attributes['custom_properties'] ?? [],
            $attributes['custom_headers'] ?? [],
        );
    }
}
