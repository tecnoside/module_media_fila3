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
>>>>>>> 21c6e7d (up)
        return new static('The given uuid is being used for an existing media item.');
    }
}
