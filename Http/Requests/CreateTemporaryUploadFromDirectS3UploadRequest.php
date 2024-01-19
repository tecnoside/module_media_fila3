<?php

declare(strict_types=1);

namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Media\Models\Media;

class CreateTemporaryUploadFromDirectS3UploadRequest extends FormRequest
{
    /**
     * @return string[]
     *
     * @psalm-return array{uuid: string, key: 'required', bucket: 'required', name: 'required', content_type: 'required', size: 'required'}
     */
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

    /**
     * @return (array|string)[]
     *
     * @psalm-return array{'uuid.unique': array|string}
     */
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
        $mediaModel = new $mediaModelClass;

        if ($mediaModel->getConnectionName() === 'default') {
=======
        $mediaModel = new $mediaModelClass();

        if ('default' === $mediaModel->getConnectionName()) {
>>>>>>> 771f698d (first)
=======
        $mediaModel = new $mediaModelClass;

        if ($mediaModel->getConnectionName() === 'default') {
>>>>>>> 7cc85766 (rebase 1)
=======
        $mediaModel = new $mediaModelClass;

        if ($mediaModel->getConnectionName() === 'default') {
>>>>>>> 76f3bf5f (first)
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
        $mediaModel = new $mediaModelClass;
=======
        $mediaModel = new $mediaModelClass();
>>>>>>> 771f698d (first)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> 7cc85766 (rebase 1)
=======
        $mediaModel = new $mediaModelClass;
>>>>>>> 76f3bf5f (first)

        return $mediaModel->getTable();
    }
}
