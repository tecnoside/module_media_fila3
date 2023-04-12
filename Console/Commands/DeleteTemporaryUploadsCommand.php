<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3683366 (Fix styling)
declare(strict_types=1);

namespace Modules\Media\Console\Commands;
=======
=======
declare(strict_types=1);

>>>>>>> 931017b (Fix styling)
namespace Themes\Media\Console\Commands;
>>>>>>> a573407 (up)
=======
namespace Modules\Media\Console\Commands;
>>>>>>> ecdd4cb (up)

use Illuminate\Console\Command;

class DeleteTemporaryUploadsCommand extends Command {
    protected $signature = 'media-library:delete-old-temporary-uploads';

    protected $description = 'Delete old temporary uploads';

    public function handle() {
        $this->info('Start removing old temporary uploads...');

        $temporaryUploadModelClass = config('media-library.temporary_upload_model');

        $temporaryUploads = $temporaryUploadModelClass::old()->get();

        $temporaryUploads->each->delete();

        $this->comment($temporaryUploads->count().' old temporary upload(s) deleted!');
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a573407 (up)
=======
}
>>>>>>> 931017b (Fix styling)
=======
}
>>>>>>> ecdd4cb (up)
=======
}
>>>>>>> 3683366 (Fix styling)
