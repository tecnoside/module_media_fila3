<?php

declare(strict_types=1);

namespace Modules\Media\Rules\ItemRules;

use Illuminate\Contracts\Validation\Rule;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Modules\Media\Models\Media;

abstract class MediaItemRule implements Rule
{
    public array $value;

    /**
     * Undocumented function.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (! is_array($value)) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->value = $value;

        return $this->validateMediaItem();
    }

    public function getTemporaryUploadMedia(): ?Media
    {
        $temporaryUploadModelClass = strval(config('media-library.temporary_upload_model'));

        $temporaryUpload = $temporaryUploadModelClass::findByMediaUuidInCurrentSession($this->value['uuid']);

        if (! $temporaryUpload) {
            return null;
        }

        return $temporaryUpload->getFirstMedia();
    }

    abstract public function validateMediaItem(): bool;
}
