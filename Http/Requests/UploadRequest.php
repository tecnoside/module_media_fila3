<?php

<<<<<<< HEAD
declare(strict_types=1);

=======
>>>>>>> a573407 (up)
namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Media\Rules\FileExtensionRule;
use Modules\Media\Support\DefaultAllowedExtensions;

class UploadRequest extends FormRequest
{
    public function rules(): array
    {
        $configuredAllowedExtensions = config('media-library.temporary_uploads_allowed_extensions');

        $allowedExtensions = $configuredAllowedExtensions ?? DefaultAllowedExtensions::all();

        $allowedExtensionsString = implode(',', $allowedExtensions);

        return [
            'uuid' => "unique:{$this->getDatabaseConnection()}{$this->getMediaTableName()}",
            'name' => '',
            'custom_properties' => '',
            'file' => [
<<<<<<< HEAD
                'max:'.config('media-library.max_file_size') / 1024,
                'mimes:'.$allowedExtensionsString,
=======
                'max:' . config('media-library.max_file_size') / 1024,
                "mimes:" . $allowedExtensionsString,
>>>>>>> a573407 (up)
                new FileExtensionRule($allowedExtensions),
            ],
        ];
    }

    protected function getDatabaseConnection(): string
    {
        $mediaModelClass = config('media-library.media_model');

        /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $mediaModel */
<<<<<<< HEAD
        $mediaModel = new $mediaModelClass();

        if ('default' === $mediaModel->getConnectionName()) {
=======
        $mediaModel = new $mediaModelClass;

        if ($mediaModel->getConnectionName() === 'default') {
>>>>>>> a573407 (up)
            return '';
        }

        return "{$mediaModel->getConnectionName()}.";
    }

    protected function getMediaTableName(): string
    {
        $mediaModelClass = config('media-library.media_model');

        /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $mediaModel */
<<<<<<< HEAD
        $mediaModel = new $mediaModelClass();
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> a573407 (up)

        return $mediaModel->getTable();
    }

    public function messages()
    {
        return [
            'uuid.unique' => trans('medialibrary-pro::upload_request.uuid_not_unique'),
        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> a573407 (up)
