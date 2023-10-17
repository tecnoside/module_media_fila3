<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Media\Filament\Resources\TemporaryUploadResource;

class ListTemporaryUploads extends ListRecords
{
    protected static string $resource = TemporaryUploadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
