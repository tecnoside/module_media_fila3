<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class Media extends SpatieMedia
{
    public function temporaryUpload(): BelongsTo
    {
        // MediaLibraryPro::ensureInstalled();

        return $this->belongsTo(TemporaryUpload::class);
    }

    public static function findWithTemporaryUploadInCurrentSession(array $uuids): Collection
    {
        // MediaLibraryPro::ensureInstalled();

        return static::query()
            ->whereIn('uuid', $uuids)
            ->whereHasMorph(
                'model',
                [TemporaryUpload::class],
                fn (Builder $builder) => $builder->where('session_id', session()->getId())
            )
            ->get();
    }

    public function setCustomProperties(array $data)
    {
        foreach ($data as $k => $v) {
            $this->setCustomProperty($k, $v);
        }
    }
}
