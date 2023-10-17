<?php

declare(strict_types=1);

namespace Modules\Media\Rules\Concerns;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Media\Rules\GroupRules\MinItemsRule;
use Modules\Media\Rules\GroupRules\MinTotalSizeInKbRule;
use Modules\Media\Rules\ItemRules\AttributeRule;
use Modules\Media\Rules\UploadedMediaRules;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use function is_string;

>>>>>>> 49d7c0c (first)
=======
use function is_string;

>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
/** @var FormRequest $this */
trait ValidatesMedia
{
    public function validateResolved(): void
    {
        $this->prepareForValidation();

        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        }

        $validator = $this->getValidatorInstance();

        $rules = $validator->getRules();

        $this->rewrittenRules = $this->moveItemRulesToMediaItems($rules);

        $validator->setRules($this->rewrittenRules);

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }

        $this->passedValidation();
    }

    public function getRewrittenRules(): array
    {
        return $this->rewrittenRules ?? [];
    }

    public function moveItemRulesToMediaItems(array $rules): array
    {
        [$itemRules, $remainingRules] = $this->filterItemRules($rules);

        return array_merge($remainingRules, $itemRules);
    }

    public function filterItemRules(array $allAttributeRules): array
    {
        $itemRules = [];
        $remainingRules = [];

        foreach ($allAttributeRules as $attribute => $attributeRules) {
            $remainingRules[$attribute] = [];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            if (\is_string($attributeRules)) {
=======
            if (is_string($attributeRules)) {
>>>>>>> 49d7c0c (first)
=======
            if (is_string($attributeRules)) {
>>>>>>> master
=======
            if (\is_string($attributeRules)) {
>>>>>>> ed2c51e (Check & fix styling)
                $remainingRules[$attribute] = $allAttributeRules;

                continue;
            }

            foreach ($attributeRules as $attributeRule) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                if (\is_string($attributeRule)) {
=======
                if (is_string($attributeRule)) {
>>>>>>> 49d7c0c (first)
=======
                if (is_string($attributeRule)) {
>>>>>>> master
=======
                if (\is_string($attributeRule)) {
>>>>>>> ed2c51e (Check & fix styling)
                    $remainingRules[$attribute][] = $attributeRule;
                } elseif ($attributeRule instanceof UploadedMediaRules) {
                    foreach ($attributeRule->groupRules as $groupRule) {
                        $remainingRules[$attribute][] = $groupRule;
                    }
                    foreach ($attributeRule->itemRules as $itemRule) {
                        if ($itemRule instanceof AttributeRule) {
                            $ruleAttribute = $itemRule->attribute;

                            $itemRules["{$attribute}.*.{$ruleAttribute}"][] = $itemRule;
                        } else {
                            $itemRules["{$attribute}.*"][] = $itemRule;
                        }
                    }
                } else {
                    $remainingRules[$attribute][] = $attributeRule;
                }

                $minimumRuleUsed = collect($remainingRules[$attribute])->contains(function ($attributeRule): bool {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    if (\is_string($attributeRule)) {
=======
                    if (is_string($attributeRule)) {
>>>>>>> 49d7c0c (first)
=======
                    if (is_string($attributeRule)) {
>>>>>>> master
=======
                    if (\is_string($attributeRule)) {
>>>>>>> ed2c51e (Check & fix styling)
                        return false;
                    }

                    if ($attributeRule instanceof MinItemsRule && $attributeRule->getMinItemCount()) {
                        return true;
                    }

                    return $attributeRule instanceof MinTotalSizeInKbRule && $attributeRule->getMinTotalSizeInKb();
                });

                if ($minimumRuleUsed) {
                    $remainingRules[$attribute][] = 'required';
                }
            }
        }

        return [$itemRules, $remainingRules];
    }

    protected function validateSingleMedia(): UploadedMediaRules
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return (new UploadedMediaRules())->maxItems(1);
=======
        return (new UploadedMediaRules)->maxItems(1);
>>>>>>> 49d7c0c (first)
=======
        return (new UploadedMediaRules)->maxItems(1);
>>>>>>> master
=======
        return (new UploadedMediaRules())->maxItems(1);
>>>>>>> ed2c51e (Check & fix styling)
    }

    protected function validateMultipleMedia(): UploadedMediaRules
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return new UploadedMediaRules();
=======
        return new UploadedMediaRules;
>>>>>>> 49d7c0c (first)
=======
        return new UploadedMediaRules;
>>>>>>> master
=======
        return new UploadedMediaRules();
>>>>>>> ed2c51e (Check & fix styling)
    }
}
