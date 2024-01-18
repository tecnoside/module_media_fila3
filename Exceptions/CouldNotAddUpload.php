<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
use Exception;

class CouldNotAddUpload extends Exception
=======
class CouldNotAddUpload extends \Exception
>>>>>>> 771f698d (first)
{
    public static function uuidAlreadyExists(): self
    {
        return new self('The given uuid is being used for an existing media item.');
    }
}
