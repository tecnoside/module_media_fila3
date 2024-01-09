<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\User;
use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem as BaseMediaLibraryItem;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaLibraryItem extends BaseMediaLibraryItem implements Sortable
{
    use SortableTrait;

    /**
     * @var string
     */
    protected $connection = 'media';

    /**
     * @var string
     */
    protected $table = 'media_library_items';
}
