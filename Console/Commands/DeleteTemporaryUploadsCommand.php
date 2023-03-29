<?php

<<<<<<< HEAD
namespace Modules\Media\Console\Commands;
=======
declare(strict_types=1);

namespace Themes\Media\Console\Commands;
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9

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
}
=======
}
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
