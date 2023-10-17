<?php

declare(strict_types=1);

namespace Modules\Media\Rules\ItemRules;

use Illuminate\Support\Arr;
use Modules\Media\Models\Media;
use Symfony\Component\Mime\MimeTypes;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use function in_array;

>>>>>>> 49d7c0c (first)
=======
use function in_array;

>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use function in_array;

>>>>>>> 0d0c96c (Dusting)
=======
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use function in_array;

>>>>>>> ca4973d (Dusting)
class ExtensionRule extends MediaItemRule
{
    protected array $allowedExtensions;

    /** @var string|array */
    public function __construct($allowedExtensions)
    {
        $this->allowedExtensions = Arr::wrap($allowedExtensions);
    }

    public function validateMediaItem(): bool
    {
        if (! ($media = $this->getTemporaryUploadMedia()) instanceof Media) {
            return true;
        }

        if (empty($media->mime_type)) {
            $extension = pathinfo($media->file_name, PATHINFO_EXTENSION);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            return \in_array($extension, $this->allowedExtensions, true);
        }

        $actualExtensions = (new MimeTypes())->getExtensions($media->mime_type);
=======
            return in_array($extension, $this->allowedExtensions, true);
        }

        $actualExtensions = (new MimeTypes)->getExtensions($media->mime_type);
>>>>>>> 49d7c0c (first)
=======
            return in_array($extension, $this->allowedExtensions, true);
        }

        $actualExtensions = (new MimeTypes)->getExtensions($media->mime_type);
>>>>>>> master
=======
            return \in_array($extension, $this->allowedExtensions, true);
        }

        $actualExtensions = (new MimeTypes())->getExtensions($media->mime_type);
>>>>>>> ed2c51e (Check & fix styling)
=======
            return in_array($extension, $this->allowedExtensions, true);
        }

        $actualExtensions = (new MimeTypes)->getExtensions($media->mime_type);
>>>>>>> 0d0c96c (Dusting)
=======
            return \in_array($extension, $this->allowedExtensions, true);
        }

        $actualExtensions = (new MimeTypes())->getExtensions($media->mime_type);
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            return in_array($extension, $this->allowedExtensions, true);
        }

        $actualExtensions = (new MimeTypes)->getExtensions($media->mime_type);
>>>>>>> ca4973d (Dusting)

        return [] !== array_intersect($actualExtensions, $this->allowedExtensions);
    }

    public function message()
    {
        return __('media::validation.extension', [
            'extensions' => implode(', ', $this->allowedExtensions),
        ]);
    }
}
