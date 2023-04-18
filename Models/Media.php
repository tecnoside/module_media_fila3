<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

/**
 * Modules\Media\Models\Media.
 *
 * @property int                                           $id
 * @property string                                        $model_type
 * @property int                                           $model_id
 * @property string|null                                   $uuid
 * @property string                                        $collection_name
 * @property string                                        $name
 * @property string                                        $file_name
 * @property string|null                                   $mime_type
 * @property string                                        $disk
 * @property string|null                                   $conversions_disk
 * @property int                                           $size
 * @property array                                         $manipulations
 * @property array                                         $custom_properties
 * @property array                                         $generated_conversions
 * @property array                                         $responsive_images
 * @property int|null                                      $order_column
 * @property \Illuminate\Support\Carbon|null               $created_at
 * @property \Illuminate\Support\Carbon|null               $updated_at
 * @property string|null                                   $created_by
 * @property string|null                                   $updated_by
 * @property int                                           $user_id
 * @property \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   newQuery()
 * @method static Builder|Media                                                                 ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereGeneratedConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media                                   whereUuid($value)
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> get($columns = ['*'])
 * @property-read \Modules\Media\Models\TemporaryUpload|null $temporaryUpload
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, static> get($columns = ['*'])
 * @mixin \Eloquent
 */
class Media extends SpatieMedia
{
    public function temporaryUpload(): BelongsTo
    {
        // MediaLibraryPro::ensureInstalled();

        return $this->belongsTo(TemporaryUpload::class);
    }

    public static function findWithTemporaryUploadInCurrentSession(array $uuids)
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
}
