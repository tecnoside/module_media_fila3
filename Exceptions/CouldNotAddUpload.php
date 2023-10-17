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
class CouldNotAddUpload extends \Exception
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> 49d7c0c (first)
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> master
=======
class CouldNotAddUpload extends \Exception
>>>>>>> ed2c51e (Check & fix styling)
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> 0d0c96c (Dusting)
=======
class CouldNotAddUpload extends \Exception
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> ca4973d (Dusting)
=======
class CouldNotAddUpload extends \Exception
>>>>>>> 93f1e9f (Check & fix styling)
=======
use Exception;

class CouldNotAddUpload extends Exception
>>>>>>> cafc8d1 (Dusting)
{
    public static function uuidAlreadyExists(): static
    {
        return new static('The given uuid is being used for an existing media item.');
    }
}
