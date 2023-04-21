<?php

declare(strict_types=1);

namespace Modules\Media\Rules\ItemRules;

use Illuminate\Support\Arr;
use Symfony\Component\Mime\MimeTypes;

class ExtensionRule extends MediaItemRule
{
    protected array $allowedExtensions;

    /** @param string|array $allowedExtensions */
    public function __construct($allowedExtensions)
    {
        $this->allowedExtensions = Arr::wrap($allowedExtensions);
    }

    public function validateMediaItem(): bool
    {
        if (! $media = $this->getTemporaryUploadMedia()) {
            return true;
        }

        if (empty($media->mime_type)) {
            if (! property_exists($media, 'file_name')) {
                throw new \Exception('['.__LINE__.']['.__FILE__.']');
            }
            $extension = pathinfo($media->file_name, PATHINFO_EXTENSION);

            return in_array($extension, $this->allowedExtensions);
        }

        $actualExtensions = (new MimeTypes())->getExtensions($media->mime_type);

        return count(array_intersect($actualExtensions, $this->allowedExtensions)) > 0;
    }

    public function message()
    {
        $res = __('media-library::validation.extension', [
            'extensions' => implode(', ', $this->allowedExtensions),
        ]);
        if (is_string($res) || is_array($res)) {
            return $res;
        }
        throw new \Exception('['.__LINE__.']['.__FILE__.']');
    }
}
