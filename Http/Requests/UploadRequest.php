<?php

declare(strict_types=1);

namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Media\Models\Media;
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'max:'.config('media-library.max_file_size') / 1024,
                'mimes:'.$allowedExtensionsString,
=======
                'max:' . config('media-library.max_file_size') / 1024,
                'mimes:' . $allowedExtensionsString,
>>>>>>> 49d7c0c (first)
=======
                'max:' . config('media-library.max_file_size') / 1024,
                'mimes:' . $allowedExtensionsString,
>>>>>>> master
=======
                'max:'.config('media-library.max_file_size') / 1024,
                'mimes:'.$allowedExtensionsString,
>>>>>>> ed2c51e (Check & fix styling)
=======
                'max:' . config('media-library.max_file_size') / 1024,
                'mimes:' . $allowedExtensionsString,
>>>>>>> 0d0c96c (Dusting)
=======
                'max:'.config('media-library.max_file_size') / 1024,
                'mimes:'.$allowedExtensionsString,
>>>>>>> a4cf9d3 (Check & fix styling)
=======
                'max:' . config('media-library.max_file_size') / 1024,
                'mimes:' . $allowedExtensionsString,
>>>>>>> ca4973d (Dusting)
=======
                'max:'.config('media-library.max_file_size') / 1024,
                'mimes:'.$allowedExtensionsString,
>>>>>>> 93f1e9f (Check & fix styling)
=======
                'max:' . config('media-library.max_file_size') / 1024,
                'mimes:' . $allowedExtensionsString,
>>>>>>> cafc8d1 (Dusting)
                new FileExtensionRule($allowedExtensions),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'uuid.unique' => trans('medialibrary-pro::upload_request.uuid_not_unique'),
        ];
    }

    protected function getDatabaseConnection(): string
    {
        $mediaModelClass = config('media-library.media_model');

        /** @var Media $mediaModel */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $mediaModel = new $mediaModelClass();
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> 49d7c0c (first)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> master
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> ed2c51e (Check & fix styling)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> 0d0c96c (Dusting)
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> ca4973d (Dusting)
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> cafc8d1 (Dusting)

        if ('default' === $mediaModel->getConnectionName()) {
            return '';
        }

        return "{$mediaModel->getConnectionName()}.";
    }

    protected function getMediaTableName(): string
    {
        $mediaModelClass = config('media-library.media_model');

        /** @var Media $mediaModel */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $mediaModel = new $mediaModelClass();
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> 49d7c0c (first)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> master
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> ed2c51e (Check & fix styling)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> 0d0c96c (Dusting)
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> ca4973d (Dusting)
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> cafc8d1 (Dusting)

        return $mediaModel->getTable();
    }
}
