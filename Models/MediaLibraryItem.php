<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use RalphJSmit\Filament\MediaLibrary\Media\Models\MediaLibraryItem as BaseMediaLibraryItem;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class MediaLibraryItem extends BaseMediaLibraryItem implements Sortable
{
    use SortableTrait;
}
