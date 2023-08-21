<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

class CouldNotAddUpload extends \Exception
{
    public static function uuidAlreadyExists()
    {
        return new static('The given uuid is being used for an existing media item.');
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Media\Exceptions;

use Exception;

class CouldNotAddUpload extends Exception
{
    public static function uuidAlreadyExists()
    {
        return new static('The given uuid is being used for an existing media item.');
    }
}
>>>>>>> a3a7396af796524a496143c651cbef32b21962d2
