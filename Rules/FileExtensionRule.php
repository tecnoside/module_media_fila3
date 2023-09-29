<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Validation\Rule;

class FileExtensionRule implements Rule
{
    protected array $validExtensions = [];

    public function __construct(array $validExtensions = [])
    {
        $this->validExtensions = array_map(
            fn (string $extension): string => strtolower($extension),
            $validExtensions,
        );
    }

    /**
     * @param string                        $attribute
     * @param UploadedFile $value
     */
    public function passes($attribute, $value): bool
    {
        return \in_array(
            strtolower((string) $value->getClientOriginalExtension()),
            $this->validExtensions,
            strict: true,
        );
    }

    public function message(): string
    {
        return trans('media::validation.mime', [
            'mimes' => implode(', ', $this->validExtensions),
        ]);
    }
}
