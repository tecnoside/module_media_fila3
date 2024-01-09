<?php
/**
 * ---
 */

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Modules\Media\Enums\AttachmentTypeEnum;
use Modules\User\Models\User;
use Modules\Xot\Traits\Updater;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class Media extends SpatieMedia
{
    use Updater;

    /**
     * @var string
     */
    protected $connection = 'media';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        // 'attachment_type' => AttachmentTypeEnum::class,
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'generated_conversions' => 'array',
        'responsive_images' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     *
     * @psalm-return Collection<int, Media>
     */
    public static function findWithTemporaryUploadInCurrentSession(array $uuids): Collection
    {
        // MediaLibraryPro::ensureInstalled();

        return static::query()
            ->whereIn('uuid', $uuids)
            ->whereHasMorph(
                'model',
                [TemporaryUpload::class],
                static fn (Builder $builder) => $builder->where('session_id', session()->getId())
            )
            ->get();
    }

    /**
     * @psalm-return BelongsTo<TemporaryUpload,Media>
     */
    public function temporaryUpload(): BelongsTo
    {
        // MediaLibraryPro::ensureInstalled();

        return $this->belongsTo(TemporaryUpload::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'created_by',
        );
    }
}
