<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

class CouldNotAddUpload extends \Exception {
    public static function uuidAlreadyExists() {
<<<<<<< HEAD
        return new static("The given uuid is being used for an existing media item.");
=======
        return new static('The given uuid is being used for an existing media item.');
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
    }
}