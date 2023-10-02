<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Media\Filament\Resources\TemporaryUploadResource;

class EditTemporaryUpload extends EditRecord
{
    protected static string $resource = TemporaryUploadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
