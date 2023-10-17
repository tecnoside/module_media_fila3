<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use function in_array;

>>>>>>> 49d7c0c (first)
=======
use function in_array;

>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use function in_array;

>>>>>>> 0d0c96c (Dusting)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string       $attribute
     * @param UploadedFile $value
     */
    public function passes($attribute, $value): bool
    {
        return \in_array(
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
     */
    public function passes($attribute, $value): bool
    {
        return in_array(
>>>>>>> 49d7c0c (first)
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
     */
    public function passes($attribute, $value): bool
    {
        return in_array(
>>>>>>> master
=======
     * @param string       $attribute
     * @param UploadedFile $value
     */
    public function passes($attribute, $value): bool
    {
        return \in_array(
>>>>>>> ed2c51e (Check & fix styling)
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
     */
    public function passes($attribute, $value): bool
    {
        return in_array(
>>>>>>> 0d0c96c (Dusting)
            strtolower($value->getClientOriginalExtension()),
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
