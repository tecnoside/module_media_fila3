<?php

declare(strict_types=1);

namespace Modules\Media\Actions;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Livewire\FileUploadConfiguration;
use Livewire\TemporaryUploadedFile;
use Modules\Media\Models\Media;
use Modules\Media\Models\TemporaryUpload;

class ConvertLivewireUploadToMediaAction
{
    public function execute(TemporaryUploadedFile $temporaryUploadedFile): Media
    {
        return $this->isLocalTemporaryDisk()
            ? $this->createFromLocalLivewireUpload($temporaryUploadedFile)
            : $this->createFromRemoteLivewireUpload($temporaryUploadedFile);
    }

    protected function isLocalTemporaryDisk(): bool
    {
        // See \Livewire\FileUploadConfiguration::isUsingS3()

        $diskBeforeTestFake = config('livewire.temporary_file_upload.disk') ?: config('filesystems.default');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return 'local' === config('filesystems.disks.'.strtolower((string) $diskBeforeTestFake).'.driver');
=======
        return 'local' === config('filesystems.disks.' . strtolower((string) $diskBeforeTestFake) . '.driver');
>>>>>>> 49d7c0c (first)
=======
        return 'local' === config('filesystems.disks.' . strtolower((string) $diskBeforeTestFake) . '.driver');
>>>>>>> master
=======
        return 'local' === config('filesystems.disks.'.strtolower((string) $diskBeforeTestFake).'.driver');
>>>>>>> ed2c51e (Check & fix styling)
=======
        return 'local' === config('filesystems.disks.' . strtolower((string) $diskBeforeTestFake) . '.driver');
>>>>>>> 0d0c96c (Dusting)
=======
        return 'local' === config('filesystems.disks.'.strtolower((string) $diskBeforeTestFake).'.driver');
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        return 'local' === config('filesystems.disks.' . strtolower((string) $diskBeforeTestFake) . '.driver');
>>>>>>> ca4973d (Dusting)
    }

    protected function createFromLocalLivewireUpload(TemporaryUploadedFile $temporaryUploadedFile): Media
    {
        $uploadedFile = new UploadedFile($temporaryUploadedFile->path(), $temporaryUploadedFile->getClientOriginalName());

        /** @var class-string<TemporaryUpload> $temporaryUploadModelClass */
        $temporaryUploadModelClass = config('media-library.temporary_upload_model');

        $temporaryUpload = $temporaryUploadModelClass::createForFile(
            $uploadedFile,
            session()->getId(),
            (string) Str::uuid(),
            $temporaryUploadedFile->getClientOriginalName()
        );

        return $temporaryUpload->getFirstMedia();
    }

    protected function createFromRemoteLivewireUpload(TemporaryUploadedFile $temporaryUploadedFile): Media
    {
        /** @var class-string<TemporaryUpload> $temporaryUploadModelClass */
        $temporaryUploadModelClass = config('media-library.temporary_upload_model');

        $livewireDisk = config('livewire.temporary_file_upload.disk', 's3');

        $livewireDirectory = FileUploadConfiguration::directory();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $remotePath = Str::of($livewireDirectory)->start('/')->finish('/').$temporaryUploadedFile->getFilename();
=======
        $remotePath = Str::of($livewireDirectory)->start('/')->finish('/') . $temporaryUploadedFile->getFilename();
>>>>>>> 49d7c0c (first)
=======
        $remotePath = Str::of($livewireDirectory)->start('/')->finish('/') . $temporaryUploadedFile->getFilename();
>>>>>>> master
=======
        $remotePath = Str::of($livewireDirectory)->start('/')->finish('/').$temporaryUploadedFile->getFilename();
>>>>>>> ed2c51e (Check & fix styling)
=======
        $remotePath = Str::of($livewireDirectory)->start('/')->finish('/') . $temporaryUploadedFile->getFilename();
>>>>>>> 0d0c96c (Dusting)
=======
        $remotePath = Str::of($livewireDirectory)->start('/')->finish('/').$temporaryUploadedFile->getFilename();
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $remotePath = Str::of($livewireDirectory)->start('/')->finish('/') . $temporaryUploadedFile->getFilename();
>>>>>>> ca4973d (Dusting)

        $temporaryUpload = $temporaryUploadModelClass::createForRemoteFile(
            $remotePath,
            session()->getId(),
            (string) Str::uuid(),
            $temporaryUploadedFile->getClientOriginalName(),
            $livewireDisk
        );

        return $temporaryUpload->getFirstMedia();
    }
}
