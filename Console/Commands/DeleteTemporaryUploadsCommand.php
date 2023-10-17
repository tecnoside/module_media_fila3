<?php

declare(strict_types=1);

namespace Modules\Media\Console\Commands;

use Illuminate\Console\Command;

class DeleteTemporaryUploadsCommand extends Command
{
    protected $signature = 'media-library:delete-old-temporary-uploads';

    protected $description = 'Delete old temporary uploads';

    public function handle(): void
    {
        $this->info('Start removing old temporary uploads...');

        $temporaryUploadModelClass = config('media-library.temporary_upload_model');

        $temporaryUploads = $temporaryUploadModelClass::old()->get();

        $temporaryUploads->each->delete();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->comment($temporaryUploads->count().' old temporary upload(s) deleted!');
=======
        $this->comment($temporaryUploads->count() . ' old temporary upload(s) deleted!');
>>>>>>> 49d7c0c (first)
=======
        $this->comment($temporaryUploads->count() . ' old temporary upload(s) deleted!');
>>>>>>> master
=======
        $this->comment($temporaryUploads->count().' old temporary upload(s) deleted!');
>>>>>>> ed2c51e (Check & fix styling)
=======
        $this->comment($temporaryUploads->count() . ' old temporary upload(s) deleted!');
>>>>>>> 0d0c96c (Dusting)
=======
        $this->comment($temporaryUploads->count().' old temporary upload(s) deleted!');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $this->comment($temporaryUploads->count() . ' old temporary upload(s) deleted!');
>>>>>>> ca4973d (Dusting)
=======
        $this->comment($temporaryUploads->count().' old temporary upload(s) deleted!');
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $this->comment($temporaryUploads->count() . ' old temporary upload(s) deleted!');
>>>>>>> cafc8d1 (Dusting)
    }
}
