<?php

declare(strict_types=1);

namespace Modules\Media\Rules\ItemRules;

class WidthBetweenRule extends MediaItemRule
{
    public function __construct(
        protected int $minWidth = 0,
        protected int $maxWidth = 0
    ) {
    }

    public function validateMediaItem(): bool
    {
        if (! $media = $this->getTemporaryUploadMedia()) {
            return true;
        }

        $size = getimagesize($media->getPath());
        if (false === $size) {
            return false;
        }
        $actualWidth = $size[0];

        return $actualWidth >= $this->minWidth && $actualWidth <= $this->maxWidth;
    }

    public function message()
    {
        $res = __('media-library::validation.width_not_between', [
            'min' => $this->minWidth,
            'max' => $this->maxWidth,
        ]);
        if (is_string($res) || is_array($res)) {
            return $res;
        }
        throw new \Exception('['.__LINE__.']['.__FILE__.']');
    }
}
