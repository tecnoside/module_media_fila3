<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> a573407 (up)
=======
declare(strict_types=1);

>>>>>>> 931017b (Fix styling)
namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Media\Rules\FileExtensionRule;
use Modules\Media\Support\DefaultAllowedExtensions;

class UploadRequest extends FormRequest {
    public function rules(): array {
        $configuredAllowedExtensions = config('media-library.temporary_uploads_allowed_extensions');

        $allowedExtensions = $configuredAllowedExtensions ?? DefaultAllowedExtensions::all();

        $allowedExtensionsString = implode(',', $allowedExtensions);

        return [
            'uuid' => "unique:{$this->getDatabaseConnection()}{$this->getMediaTableName()}",
            'name' => '',
            'custom_properties' => '',
            'file' => [
<<<<<<< HEAD
<<<<<<< HEAD
                'max:'.config('media-library.max_file_size') / 1024,
                'mimes:'.$allowedExtensionsString,
=======
                'max:' . config('media-library.max_file_size') / 1024,
                "mimes:" . $allowedExtensionsString,
>>>>>>> a573407 (up)
=======
                'max:'.config('media-library.max_file_size') / 1024,
                'mimes:'.$allowedExtensionsString,
>>>>>>> 931017b (Fix styling)
                new FileExtensionRule($allowedExtensions),
            ],
        ];
    }

    protected function getDatabaseConnection(): string {
        $mediaModelClass = config('media-library.media_model');

        /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $mediaModel */
<<<<<<< HEAD
<<<<<<< HEAD
        $mediaModel = new $mediaModelClass();

        if ('default' === $mediaModel->getConnectionName()) {
=======
        $mediaModel = new $mediaModelClass;

        if ($mediaModel->getConnectionName() === 'default') {
>>>>>>> a573407 (up)
=======
        $mediaModel = new $mediaModelClass();

        if ('default' === $mediaModel->getConnectionName()) {
>>>>>>> 931017b (Fix styling)
            return '';
        }

        return "{$mediaModel->getConnectionName()}.";
    }

    protected function getMediaTableName(): string {
        $mediaModelClass = config('media-library.media_model');

        /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $mediaModel */
<<<<<<< HEAD
<<<<<<< HEAD
        $mediaModel = new $mediaModelClass();
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> a573407 (up)
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> 931017b (Fix styling)

        return $mediaModel->getTable();
    }

    public function messages() {
        return [
            'uuid.unique' => trans('medialibrary-pro::upload_request.uuid_not_unique'),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a573407 (up)
=======
}
>>>>>>> 931017b (Fix styling)
