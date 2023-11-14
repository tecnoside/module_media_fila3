<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\User\Models\User;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem as BaseMediaLibraryItem;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Modules\Media\Models\MediaLibraryItem.
 *
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read User|null $user
 * @method static \RalphJSmit\Filament\MediaLibrary\Database\Factories\Media\MediaLibraryFactory factory($count = null, $state = [])
 * @method static Builder|MediaLibraryItem newModelQuery()
 * @method static Builder|MediaLibraryItem newQuery()
 * @method static Builder|MediaLibraryItem ordered(string $direction = 'asc')
 * @method static Builder|MediaLibraryItem query()
 * @mixin \Eloquent
 */
class MediaLibraryItem extends BaseMediaLibraryItem implements Sortable
{
    use SortableTrait;

    /**
     * @var string
     */
    protected $table = 'media_library_items';
}
