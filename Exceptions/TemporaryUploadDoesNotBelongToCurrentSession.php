<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
=======
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
>>>>>>> f1b3b202 (rebase 7)
{
    public static function create(): self
    {
        return new self('The session id of the given temporary upload does not match the current session id.');
    }
}
