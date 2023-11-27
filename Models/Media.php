<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\Media\Enums\AttachmentTypeEnum;
use Modules\User\Models\User;
use Modules\Xot\Traits\Updater;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

/**
 * Modules\Media\Models\Media.
 *
 * @property-read User|null $creator
 * @property-read Model|\Eloquent $model
 * @property-read \Modules\Media\Models\TemporaryUpload|null $temporaryUpload
 * @method static MediaCollection<int, static> all($columns = ['*'])
 * @method static MediaCollection<int, static> get($columns = ['*'])
 * @method static Builder|Media newModelQuery()
 * @method static Builder|Media newQuery()
 * @method static Builder|Media ordered()
 * @method static Builder|Media query()
 * @mixin Eloquent
 */
class Media extends SpatieMedia
{
    use Updater;

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
