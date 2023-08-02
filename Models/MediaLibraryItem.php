<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem as BaseMediaLibraryItem;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * Modules\Media\Models\MediaLibraryItem
 *
 * @property int $id
 * @property int|null $uploaded_by_user_id
 * @property string|null $caption
 * @property string|null $alt_text
 * @property int|null $folder_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $order_column
 * @property-read \RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryFolder|null $folder
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Modules\User\Models\User|null $user
 * @method static \RalphJSmit\Filament\MediaLibrary\Database\Factories\Media\MediaLibraryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereFolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaLibraryItem whereUploadedByUserId($value)
 * @mixin \Eloquent
 */
class MediaLibraryItem extends BaseMediaLibraryItem implements Sortable
{
    use SortableTrait;
}
