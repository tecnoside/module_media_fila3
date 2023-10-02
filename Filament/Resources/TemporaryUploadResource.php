<?php

namespace Modules\Media\Filament\Resources;

use Modules\Media\Filament\Resources\TemporaryUploadResource\Pages;
//use Modules\Media\Filament\Resources\TemporaryUploadResource\RelationManagers;
use Modules\Media\Models\TemporaryUpload;
//use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletingScope;

class TemporaryUploadResource extends Resource
{
    protected static ?string $model = TemporaryUpload::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                //{{ tableEmptyStateActions }}
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemporaryUploads::route('/'),
            'create' => Pages\CreateTemporaryUpload::route('/create'),
            'edit' => Pages\EditTemporaryUpload::route('/{record}/edit'),
        ];
    }
}