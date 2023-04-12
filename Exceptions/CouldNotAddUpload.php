<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
class CouldNotAddUpload extends \Exception
{
    public static function uuidAlreadyExists()
    {
=======
class CouldNotAddUpload extends \Exception {
    public static function uuidAlreadyExists() {
<<<<<<< HEAD
>>>>>>> a573407 (up)
=======
>>>>>>> ecdd4cb (up)
        return new static('The given uuid is being used for an existing media item.');
    }
}
