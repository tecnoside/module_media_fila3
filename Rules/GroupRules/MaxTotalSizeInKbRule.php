<?php

declare(strict_types=1);

namespace Modules\Media\Rules\GroupRules;

use Illuminate\Contracts\Validation\Rule;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\File;

class MaxTotalSizeInKbRule implements Rule
{
    protected int $actualTotalSizeInKb;

    public function __construct(protected int $maxTotalSizeInKb)
    {
    }

    /**
     * Undocumented function.
     *
     * @param string $attribute
     * @param array  $uploadedItems
     */
    public function passes($attribute, $uploadedItems): bool
    {
        $uuids = collect($uploadedItems)
            ->map(fn (array $uploadedItemAttributes) => $uploadedItemAttributes['uuid'])
            ->toArray();

        $media = Media::findWithTemporaryUploadInCurrentSession($uuids);

        $this->actualTotalSizeInKb = $media->totalSizeInBytes();

        return $this->actualTotalSizeInKb <= ($this->maxTotalSizeInKb * 1024);
    }

    public function message()
    {
        $res = __('media-library::validation.total_upload_size_too_high', [
            'max' => File::getHumanReadableSize($this->maxTotalSizeInKb * 1024),
            'maxInKb' => $this->maxTotalSizeInKb,
            'actual' => File::getHumanReadableSize($this->actualTotalSizeInKb * 1024),
            'actualInKb' => $this->actualTotalSizeInKb,
        ]);
        if (is_string($res) || is_array($res)) {
            return $res;
        }
        throw new \Exception('['.__LINE__.']['.__FILE__.']');
    }
}
