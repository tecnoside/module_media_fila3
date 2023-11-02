<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Media\Rules\ItemRules\AttributeRule;

class UploadedMediaRules implements Rule
{
    public array $groupRules = [];

    public array $itemRules = [];

    public function attribute(string $attribute, array|string $rules): static
    {
        $this->itemRules[] = new AttributeRule($attribute, $rules);

        return $this;
    }

    public function passes($attribute, $value): void
    {
        // this page has been left intentionally blank
    }

    public function message(): void
    {
        // this page has been left intentionally blank
    }
}
