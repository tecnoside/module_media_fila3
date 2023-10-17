<?php

declare(strict_types=1);

namespace Modules\Media\Http\Livewire\Media;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Modules\Media\Actions\ConvertLivewireUploadToMediaAction;

class Uploader extends Component
{
    use WithFileUploads {
        uploadErrored as protected uploadErroredTrait;
    }

    /** @var string */
    public $rules;

    /** @var string */
    public $name;

    /** @var \Livewire\TemporaryUploadedFile|null */
    public $upload;

    /** @var string|null */
    public $uuid;

    /** @var bool */
    public $multiple;

    /** @var bool */
    public $add;

    /** @var string|null */
    public $uploadError;

    public function mount(string $rules, string $name, bool $multiple = false, string $uuid = null, bool $add = false): void
    {
        $this->rules = $rules;

        $this->name = $name;

        $this->multiple = $multiple;

        $this->uuid = $uuid ?? (string) Str::uuid();

        $this->add = $add;
    }

    public function updatedUpload(): void
    {
        $uploadError = $this->getUploadError();

        if (null !== $uploadError) {
            $this->uploadError = $uploadError;

            if (! $this->add) {
                $this->emit("{$this->name}:uploadError", $this->uuid, $uploadError);
            }

            return;
        }

        $uploads = $this->multiple
            ? $this->upload
            : [$this->upload];

        foreach ($uploads as $upload) {
            $this->handleUpload($upload);
        }
    }

    public function uploadErrored($name, $errorsInJson, $isMultiple): void
    {
        try {
            $this->uploadErroredTrait($name, $errorsInJson, $isMultiple);
        } catch (ValidationException $exception) {
            $uploadError = str_replace('.0', '', $exception->validator->errors()->first());

            $this->add
                ? $this->emit("{$this->name}:showListErrorMessage", $uploadError)
                : $this->emit("{$this->name}:uploadError", $this->uuid, $exception->validator->errors()->first());
        }
    }

    public function render()
    {
        return view('media::livewire.uploader');
    }

    protected function getUploadError(): ?string
    {
        $uploadError = null;

        $field = $this->multiple ? 'upload.*' : 'upload';

        try {
            $this->validate([
                $field => $this->rules,
            ], ["{$field}.mimes" => __('media::validation.type')]);
        } catch (ValidationException $validationException) {
            $uploadError = Arr::flatten($validationException->errors())[0];

            if ($this->add) {
                $this->emit("{$this->name}:showListErrorMessage", $uploadError);
            }
        }

        return $uploadError;
    }

    protected function handleUpload(TemporaryUploadedFile $temporaryUploadedFile)
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $media = (new ConvertLivewireUploadToMediaAction())->execute($temporaryUploadedFile);
=======
        $media = (new ConvertLivewireUploadToMediaAction)->execute($temporaryUploadedFile);
>>>>>>> 49d7c0c (first)
=======
        $media = (new ConvertLivewireUploadToMediaAction)->execute($temporaryUploadedFile);
>>>>>>> master
=======
        $media = (new ConvertLivewireUploadToMediaAction())->execute($temporaryUploadedFile);
>>>>>>> ed2c51e (Check & fix styling)
=======
        $media = (new ConvertLivewireUploadToMediaAction)->execute($temporaryUploadedFile);
>>>>>>> 0d0c96c (Dusting)
=======
        $media = (new ConvertLivewireUploadToMediaAction())->execute($temporaryUploadedFile);
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        $media = (new ConvertLivewireUploadToMediaAction)->execute($temporaryUploadedFile);
>>>>>>> ca4973d (Dusting)
=======
        $media = (new ConvertLivewireUploadToMediaAction())->execute($temporaryUploadedFile);
>>>>>>> 93f1e9f (Check & fix styling)
=======
        $media = (new ConvertLivewireUploadToMediaAction)->execute($temporaryUploadedFile);
>>>>>>> cafc8d1 (Dusting)
=======
        $media = (new ConvertLivewireUploadToMediaAction())->execute($temporaryUploadedFile);
>>>>>>> c47cbe6 (Check & fix styling)
=======
        $media = (new ConvertLivewireUploadToMediaAction)->execute($temporaryUploadedFile);
>>>>>>> 214f9b0 (Dusting)

        $this->emit("{$this->name}:fileAdded", [
            'name' => $media->name,
            'fileName' => $media->file_name,
            'oldUuid' => $this->uuid,
            'uuid' => $media->uuid,
            'previewUrl' => $media->hasGeneratedConversion('preview') ? $media->getUrl('preview') : '',
            'order' => $media->order_column,
            'size' => $media->size,
            'mime_type' => $media->mime_type,
            'extension' => pathinfo($media->file_name, PATHINFO_EXTENSION),
        ]);
    }
}
