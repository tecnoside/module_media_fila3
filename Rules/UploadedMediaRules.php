<?php

declare(strict_types=1);

namespace Modules\Media\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;
use Modules\Media\Rules\GroupRules\MaxItemsRule;
use Modules\Media\Rules\GroupRules\MaxTotalSizeInKbRule;
use Modules\Media\Rules\GroupRules\MinItemsRule;
use Modules\Media\Rules\GroupRules\MinTotalSizeInKbRule;
use Modules\Media\Rules\ItemRules\AttributeRule;
use Modules\Media\Rules\ItemRules\DimensionsRule;
use Modules\Media\Rules\ItemRules\ExtensionRule;
use Modules\Media\Rules\ItemRules\HeightBetweenRule;
use Modules\Media\Rules\ItemRules\MaxItemSizeInKbRule;
use Modules\Media\Rules\ItemRules\MimeTypeRule;
use Modules\Media\Rules\ItemRules\MinItemSizeInKbRule;
use Modules\Media\Rules\ItemRules\WidthBetweenRule;

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
