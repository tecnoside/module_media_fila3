<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

<<<<<<< HEAD
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception
{
    public static function create(): self
    {
=======
class TemporaryUploadDoesNotBelongToCurrentSession extends \Exception {
    public static function create(): self {
>>>>>>> 21c6e7d (up)
        return new static('The session id of the given temporary upload does not match the current session id.');
    }
}
