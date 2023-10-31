<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources;

use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Media\Filament\Resources\TemporaryUploadResource\Pages\ListTemporaryUploads;
use Modules\Media\Filament\Resources\TemporaryUploadResource\Pages\CreateTemporaryUpload;
use Modules\Media\Filament\Resources\TemporaryUploadResource\Pages\EditTemporaryUpload;
use Filament\Forms\Form;
// use Modules\Media\Filament\Resources\TemporaryUploadResource\RelationManagers;
use Filament\Resources\Resource;
// use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;
use Modules\Media\Models\TemporaryUpload;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class TemporaryUploadResource extends Resource
{
    protected static ?string $model = TemporaryUpload::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    /**
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            ])
            ->filters([
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // {{ tableEmptyStateActions }}
            ]);
    }

    /**
     * @return array
     *
     * @psalm-return array<never, never>
     */
    public static function getRelations(): array
    {
        return [
        ];
    }

    /**
     * @return \Filament\Resources\Pages\PageRegistration[]
     *
     * @psalm-return array{index: \Filament\Resources\Pages\PageRegistration, create: \Filament\Resources\Pages\PageRegistration, edit: \Filament\Resources\Pages\PageRegistration}
     */
    public static function getPages(): array
    {
        return [
            'index' => ListTemporaryUploads::route('/'),
            'create' => CreateTemporaryUpload::route('/create'),
            'edit' => EditTemporaryUpload::route('/{record}/edit'),
        ];
    }
}
