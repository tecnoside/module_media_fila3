<?php

declare(strict_types=1);

namespace Modules\Media\Rules\ItemRules;

use Illuminate\Support\Arr;

class MimeTypeRule extends MediaItemRule
{
    protected array $allowedMimeTypes;

    /**
     * @param string|array $allowedMimeTypes
     */
    public function __construct($allowedMimeTypes)
    {
        $this->allowedMimeTypes = Arr::wrap($allowedMimeTypes);
    }

    public function validateMediaItem(): bool
    {
        if (! $media = $this->getTemporaryUploadMedia()) {
            return true;
        }

        return in_array($media->mime_type, $this->allowedMimeTypes);
    }

    public function message()
    {
        $res = __('media-library::validation.mime', [
            'mimes' => implode(', ', $this->allowedMimeTypes),
        ]);
        if (is_string($res) || is_array($res)) {
            return $res;
        }
        throw new \Exception('['.__LINE__.']['.__FILE__.']');
    }
}
