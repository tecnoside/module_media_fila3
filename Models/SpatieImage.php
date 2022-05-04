<?php

declare(strict_types=1);

namespace Modules\Media\Models;

// use Spatie\MediaLibrary\Models\Media as BaseMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Xot\Traits\Updater;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use Spatie\Tags\HasTags; // spatie tags

/**
 * Undocumented class.
 */
class SpatieImage extends BaseMedia {
    use Updater;
    // use Searchable;
    // use Cachable;
    use HasFactory;
    use HasTags; // spatie tags

    protected $fillable = [
        'id', 'model_type', 'model_id', 'uuid', 'collection_name', 'name',
        'file_name', 'mime_type', 'disk', 'conversions_disk', 'size', 'manipulations',
        'custom_properties', 'generated_conversions', 'responsive_images',
        'order_column', 'user_id',
        'time_from', 'time_to',
        'created_at', 'updated_at', 'created_by', 'updated_by',
    ];

    protected $table = 'spatie_images';

    /**
     * Undocumented function
     *
     * @param string|null $value
     * @return string|null
     */
    public function getVideoUrlAttribute(?string $value): ?string {
        return url('/streamsnip/'.$this->id);
    }
}