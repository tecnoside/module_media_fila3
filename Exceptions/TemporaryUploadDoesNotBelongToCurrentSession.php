<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
=======
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception
>>>>>>> 771f698d (first)
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> 7cc85766 (rebase 1)
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> 76f3bf5f (first)
{
    public static function create(): self
    {
        return new self('The session id of the given temporary upload does not match the current session id.');
    }
}
