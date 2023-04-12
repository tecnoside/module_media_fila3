<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 931017b (Fix styling)
declare(strict_types=1);

namespace Modules\Media\Http\Requests;

<<<<<<< HEAD
=======
namespace Modules\Media\Http\Requests;


>>>>>>> a573407 (up)
=======
>>>>>>> 931017b (Fix styling)
use Illuminate\Foundation\Http\FormRequest;

class CreateTemporaryUploadFromDirectS3UploadRequest extends FormRequest {
    public function rules(): array {
        return [
            'uuid' => "unique:{$this->getDatabaseConnection()}{$this->getMediaTableName()}",
            'key' => 'required',
            'bucket' => 'required',
            'name' => 'required',
            'content_type' => 'required',
            'size' => 'required',
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
