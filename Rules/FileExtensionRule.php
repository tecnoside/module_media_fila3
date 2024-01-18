<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class FileExtensionRule implements Rule
{
    protected array $validExtensions = [];

    public function __construct(array $validExtensions = [])
    {
        $this->validExtensions = array_map(
            static fn (string $extension): string => strtolower($extension),
            $validExtensions,
        );
    }

    /**
<<<<<<< HEAD
     * @param string       $attribute
     * @param UploadedFile $value
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $attribute
     * @param  UploadedFile  $value
=======
     * @param string       $attribute
     * @param UploadedFile $value
>>>>>>> 771f698d (first)
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
>>>>>>> 7cc85766 (rebase 1)
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
     */
    public function passes($attribute, $value): bool
    {
        return \in_array(
            strtolower($value->getClientOriginalExtension()),
            $this->validExtensions,
            strict: true,
        );
    }

    public function message(): array|string
    {
        return trans(
            'media::validation.mime', [
            'mimes' => implode(', ', $this->validExtensions),
            ]
        );
    }
}
