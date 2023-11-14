<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryFolder as BaseMediaLibraryFolder;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * Modules\Media\Models\MediaLibraryItem.
 *
 * @property \Illuminate\Database\Eloquent\Collection<int, MediaLibraryFolder> $children
 * @property int|null                                                          $children_count
 *
 * @method static Builder|MediaLibraryFolder newModelQuery()
 * @method static Builder|MediaLibraryFolder newQuery()
 * @method static Builder|MediaLibraryFolder ordered(string $direction = 'asc')
 * @method static Builder|MediaLibraryFolder query()
 *
 * @mixin \Eloquent
 */
class MediaLibraryFolder extends BaseMediaLibraryFolder implements Sortable
{
    use SortableTrait;

    /**
     * @var string
     */
    protected $table = 'media_library_folders';
}
