<?php

declare(strict_types=1);

namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Media\Models\Media;

class CreateTemporaryUploadFromDirectS3UploadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'uuid' => "unique:{$this->getDatabaseConnection()}{$this->getMediaTableName()}",
            'key' => 'required',
            'bucket' => 'required',
            'name' => 'required',
            'content_type' => 'required',
            'size' => 'required',
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
