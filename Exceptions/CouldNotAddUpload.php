<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
use Exception;

class CouldNotAddUpload extends Exception
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Exception;

class CouldNotAddUpload extends Exception
=======
class CouldNotAddUpload extends \Exception
>>>>>>> 771f698d (first)
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> 7cc85766 (rebase 1)
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
{
    public static function uuidAlreadyExists(): self
    {
        return new self('The given uuid is being used for an existing media item.');
    }
}
