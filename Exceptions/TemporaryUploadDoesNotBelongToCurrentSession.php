<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> 49d7c0c (first)
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> master
=======
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception
>>>>>>> ed2c51e (Check & fix styling)
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> 0d0c96c (Dusting)
=======
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> ca4973d (Dusting)
=======
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception
>>>>>>> 93f1e9f (Check & fix styling)
=======
use Exception;

class TemporaryUploadDoesNotBelongToCurrentSession extends Exception
>>>>>>> cafc8d1 (Dusting)
=======
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception
>>>>>>> c47cbe6 (Check & fix styling)
{
    public static function create(): self
    {
        return new static('The session id of the given temporary upload does not match the current session id.');
    }
}
