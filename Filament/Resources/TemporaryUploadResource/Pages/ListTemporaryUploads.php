<?php

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

use Modules\Media\Filament\Resources\TemporaryUploadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
