<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

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
=======
>>>>>>> a4cf9d3 (Check & fix styling)
=======
use function in_array;

>>>>>>> ca4973d (Dusting)
=======
>>>>>>> 93f1e9f (Check & fix styling)
=======
use function in_array;

>>>>>>> cafc8d1 (Dusting)
=======
>>>>>>> c47cbe6 (Check & fix styling)
=======
use function in_array;

>>>>>>> 214f9b0 (Dusting)
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
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
     * @param string       $attribute
     * @param UploadedFile $value
     */
    public function passes($attribute, $value): bool
    {
        return \in_array(
>>>>>>> a4cf9d3 (Check & fix styling)
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
     */
    public function passes($attribute, $value): bool
    {
        return in_array(
>>>>>>> ca4973d (Dusting)
=======
     * @param string       $attribute
     * @param UploadedFile $value
     */
    public function passes($attribute, $value): bool
    {
        return \in_array(
>>>>>>> 93f1e9f (Check & fix styling)
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
     */
    public function passes($attribute, $value): bool
    {
        return in_array(
>>>>>>> cafc8d1 (Dusting)
=======
     * @param string       $attribute
     * @param UploadedFile $value
     */
    public function passes($attribute, $value): bool
    {
        return \in_array(
>>>>>>> c47cbe6 (Check & fix styling)
=======
     * @param  string  $attribute
     * @param  UploadedFile  $value
     */
    public function passes($attribute, $value): bool
    {
        return in_array(
>>>>>>> 214f9b0 (Dusting)
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
