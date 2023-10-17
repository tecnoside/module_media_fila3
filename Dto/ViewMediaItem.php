<?php

declare(strict_types=1);

namespace Modules\Media\Dto;

use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;

class ViewMediaItem
{
    public function __construct(
        protected string $formFieldName,
        protected array $mediaAttributes
    ) {
    }

    public function propertyAttributeName(string $name): string
    {
        return "{$this->formFieldName}[{$this->uuid}][{$name}]";
    }

    public function customPropertyAttributes(string $name): HtmlString
    {
        return new HtmlString(implode(PHP_EOL, [
            "name='{$this->customPropertyAttributeName($name)}'",
            "value='{$this->customPropertyAttributeValue($name)}'",
        ]));
    }

    public function livewireCustomPropertyAttributes(string $name, int $debounceInMs = 150): HtmlString
    {
        return new HtmlString(implode(PHP_EOL, [
            'x-data',
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
            'x-on:keyup.debounce.'.$debounceInMs.'="$wire.setCustomProperty(\''.$this->uuid.'\', \''.$name.'\', document.getElementsByName(\''.$this->customPropertyAttributeName($name).'\')[0].value)"',
=======
            'x-on:keyup.debounce.' . $debounceInMs . '="$wire.setCustomProperty(\'' . $this->uuid . '\', \'' . $name . '\', document.getElementsByName(\'' . $this->customPropertyAttributeName($name) . '\')[0].value)"',
>>>>>>> 49d7c0c (first)
=======
            'x-on:keyup.debounce.' . $debounceInMs . '="$wire.setCustomProperty(\'' . $this->uuid . '\', \'' . $name . '\', document.getElementsByName(\'' . $this->customPropertyAttributeName($name) . '\')[0].value)"',
>>>>>>> master
=======
            'x-on:keyup.debounce.'.$debounceInMs.'="$wire.setCustomProperty(\''.$this->uuid.'\', \''.$name.'\', document.getElementsByName(\''.$this->customPropertyAttributeName($name).'\')[0].value)"',
>>>>>>> ed2c51e (Check & fix styling)
=======
            'x-on:keyup.debounce.' . $debounceInMs . '="$wire.setCustomProperty(\'' . $this->uuid . '\', \'' . $name . '\', document.getElementsByName(\'' . $this->customPropertyAttributeName($name) . '\')[0].value)"',
>>>>>>> 0d0c96c (Dusting)
=======
            'x-on:keyup.debounce.'.$debounceInMs.'="$wire.setCustomProperty(\''.$this->uuid.'\', \''.$name.'\', document.getElementsByName(\''.$this->customPropertyAttributeName($name).'\')[0].value)"',
>>>>>>> a4cf9d3 (Check & fix styling)
=======
            'x-on:keyup.debounce.' . $debounceInMs . '="$wire.setCustomProperty(\'' . $this->uuid . '\', \'' . $name . '\', document.getElementsByName(\'' . $this->customPropertyAttributeName($name) . '\')[0].value)"',
>>>>>>> ca4973d (Dusting)
=======
            'x-on:keyup.debounce.'.$debounceInMs.'="$wire.setCustomProperty(\''.$this->uuid.'\', \''.$name.'\', document.getElementsByName(\''.$this->customPropertyAttributeName($name).'\')[0].value)"',
>>>>>>> 93f1e9f (Check & fix styling)
=======
            'x-on:keyup.debounce.' . $debounceInMs . '="$wire.setCustomProperty(\'' . $this->uuid . '\', \'' . $name . '\', document.getElementsByName(\'' . $this->customPropertyAttributeName($name) . '\')[0].value)"',
>>>>>>> cafc8d1 (Dusting)
=======
            'x-on:keyup.debounce.'.$debounceInMs.'="$wire.setCustomProperty(\''.$this->uuid.'\', \''.$name.'\', document.getElementsByName(\''.$this->customPropertyAttributeName($name).'\')[0].value)"',
>>>>>>> c47cbe6 (Check & fix styling)
=======
            'x-on:keyup.debounce.' . $debounceInMs . '="$wire.setCustomProperty(\'' . $this->uuid . '\', \'' . $name . '\', document.getElementsByName(\'' . $this->customPropertyAttributeName($name) . '\')[0].value)"',
>>>>>>> 214f9b0 (Dusting)
            $this->customPropertyAttributes($name),
        ]));
    }

    public function customPropertyAttributeName(string $name): string
    {
        return "{$this->formFieldName}[{$this->uuid}][custom_properties][{$name}]";
    }

    public function customPropertyAttributeValue(string $name)
    {
        $value = Arr::get($this->mediaAttributes['customProperties'] ?? [], $name);

        return old($this->customPropertyErrorName($name), $value);
    }

    public function errorName(): string
    {
        return "{$this->formFieldName}.{$this->uuid}";
    }

    public function propertyErrorName(string $name): string
    {
        return "{$this->formFieldName}.{$this->uuid}.{$name}";
    }

    public function customPropertyErrorName(string $name): string
    {
        return "{$this->formFieldName}.{$this->uuid}.custom_properties.{$name}";
    }

    public function downloadUrl(): string
    {
        $mediaModelClass = config('media-library.media_model');

        return $mediaModelClass::findByUuid($this->uuid)->getUrl();
    }

    public function createdAt(): Carbon
    {
        return Carbon::createFromTimestamp($this->mediaAttributes['createdAt']);
    }

    public function __get($name)
    {
        return $this->mediaAttributes[$name] ?? null;
    }
}
