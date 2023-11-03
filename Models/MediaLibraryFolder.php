<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\User\Models\User;
use RalphJSmit\Filament\MediaLibrary\Database\Factories\Media\MediaLibraryFactory;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryFolder as BaseMediaLibraryFolder;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Modules\Media\Models\MediaLibraryItem.
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $user_id
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property int|null $order_column
 * @property-read \Illuminate\Database\Eloquent\Collection<int, MediaLibraryFolder> $children
 * @property-read int|null $children_count
 * @method static Builder|MediaLibraryFolder newModelQuery()
 * @method static Builder|MediaLibraryFolder newQuery()
 * @method static Builder|MediaLibraryFolder ordered(string $direction = 'asc')
 * @method static Builder|MediaLibraryFolder query()
 * @method static Builder|MediaLibraryFolder whereCreatedAt($value)
 * @method static Builder|MediaLibraryFolder whereCreatedBy($value)
 * @method static Builder|MediaLibraryFolder whereId($value)
 * @method static Builder|MediaLibraryFolder whereName($value)
 * @method static Builder|MediaLibraryFolder whereOrderColumn($value)
 * @method static Builder|MediaLibraryFolder whereParentId($value)
 * @method static Builder|MediaLibraryFolder whereUpdatedAt($value)
 * @method static Builder|MediaLibraryFolder whereUpdatedBy($value)
 * @method static Builder|MediaLibraryFolder whereUserId($value)
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
