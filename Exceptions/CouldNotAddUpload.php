<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
class CouldNotAddUpload extends \Exception
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> 49d7c0c (first)
{
    public static function uuidAlreadyExists(): static
    {
        return new static('The given uuid is being used for an existing media item.');
    }
}
