<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
=======
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
<<<<<<< HEAD
>>>>>>> f1b3b202 (rebase 7)
=======
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
{
    public static function create(): self
    {
        return new self('The session id of the given temporary upload does not match the current session id.');
    }
}
