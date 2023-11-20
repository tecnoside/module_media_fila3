<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
=======
>>>>>>> 87803b1 (up)
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
=======
>>>>>>> f54fd74 (Check & fix styling)
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Modules\Camping\Filament\Resources\AssetResource\Actions\AttachmentDownloadBulkAction;
use Modules\Media\Enums\AttachmentTypeEnum;

class AttachmentResource extends Resource
{
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form, bool $asset = true): Form
    {
        return $form
            ->schema(
                self::getFormSchema($asset)
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('collection_name')
                    ->translateLabel()
                    ->label('camping::tables.attachments.collection_name'),

                TextColumn::make('name')
                    ->translateLabel()
                    ->label('camping::tables.attachments.filename'),

                TextColumn::make('human_readable_size')
                    ->translateLabel()
                    ->label('camping::tables.attachments.size'),

                TextColumn::make('creator.full_name')
                    ->translateLabel()
                    ->label('camping::tables.attachments.creator')
<<<<<<< HEAD
<<<<<<< HEAD
                    // ->default(fn($record)=>dddx($record))
=======
                    //->default(fn($record)=>dddx($record))
>>>>>>> 87803b1 (up)
=======
                    // ->default(fn($record)=>dddx($record))
>>>>>>> f54fd74 (Check & fix styling)
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->translateLabel()
                    ->label('camping::tables.attachments.uploaded_at')
                    ->dateTime('d M, Y H:i:s')
                    ->toggleable(),
            ])
            ->filters([
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('view_attachment')
                        ->translateLabel()
                        ->label('camping::actions.view.labels.main_label')
                        ->icon('heroicon-s-eye')
                        ->color('gray')
                        ->url(
                            fn ($record): string => $record->getUrl()
                        )->openUrlInNewTab(true),
                    DeleteAction::make()->requiresConfirmation(),
                    Action::make('download_attachment')
                        ->translateLabel()
                        ->label('camping::actions.download.labels.main_label')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('primary')
                        ->action(
                            // File extension obtained by substringing
                            fn ($record) => response()->download($record->getPath(), $record->name.substr(strrchr((string) $record->file_name, '.'), 0))
                        ),
                ]),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                AttachmentDownloadBulkAction::make(),
            ])
            ->defaultSort(
                column: 'created_at',
                direction: 'DESC',
            );
    }

    /**
     * @return (Radio|TextInput|\Filament\Forms\Components\BaseFileUpload|FileUpload)[]
     *
     * @psalm-return list{\Filament\Forms\Components\BaseFileUpload&FileUpload, Radio, TextInput}
     */
    public static function getFormSchema(bool $asset = true): array
    {
        return [
            FileUpload::make('file')
                ->translateLabel()
                ->label('camping::forms.attachments.fields.file.field_name')
                ->hint(
                    trans('camping::forms.attachments.fields.file.hint'),
                )
                ->storeFileNamesIn('original_file_name')
                ->disk(
                    $asset ? config('camping.asset.attachments.disk.driver') : config('camping.operation.attachments.disk.driver'),
                )
                ->acceptedFileTypes(
                    $asset ? config('camping.asset.attachments.allowed_file_types') : config('camping.operation.attachments.allowed_file_types'),
                )
                ->visibility('private')
                ->maxSize(
                    config('media-library.max_file_size'),
                )
                ->required()
                ->columnSpanFull(),
            /*
            Radio::make('attachment_type')
                ->hiddenLabel()
                ->options(
                    AttachmentTypeEnum::descriptionsByValue($asset ? AttachmentTypeEnum::cases() : AttachmentTypeEnum::operationCases()),
                )
                ->default(AttachmentTypeEnum::Image())
                ->columns(
                    $asset ? \count(AttachmentTypeEnum::cases()) : \count(AttachmentTypeEnum::operationCases()),
                )
                ->required()
                ->columnSpanFull(),
            */
<<<<<<< HEAD
<<<<<<< HEAD
            // Radio::make('attachment_type')->columnSpanFull(),
=======
            //Radio::make('attachment_type')->columnSpanFull(),
>>>>>>> 87803b1 (up)
=======
            // Radio::make('attachment_type')->columnSpanFull(),
>>>>>>> f54fd74 (Check & fix styling)
            TextInput::make('name')
                ->translateLabel()
                ->label('camping::forms.attachments.fields.name.field_name')
                ->hint(
                    trans('camping::forms.attachments.fields.name.hint'),
                )
                ->autocomplete(false)
                ->maxLength(255)
                ->columnSpanFull(),
        ];
    }

    public static function formHandlerCallback(RelationManager $livewire, array $data): void
    {
        $ownerRecord = $livewire->getOwnerRecord();
<<<<<<< HEAD
<<<<<<< HEAD
        $mediaCollection = $data['attachment_type'] ?? 'default';
        // $mediaCollection = 'default';
=======
        $mediaCollection=$data['attachment_type'] ?? 'default';
>>>>>>> 87803b1 (up)
=======
        $mediaCollection = $data['attachment_type'] ?? 'default';
>>>>>>> f54fd74 (Check & fix styling)

        if (! method_exists($ownerRecord, 'addMediaFromDisk')) {
            throw new \Exception('wip');
        }

        // dddx($ownerRecord);

        $attachment = $ownerRecord
            ->addMediaFromDisk(
                $data['file'],
                config('attachment.upload.disk.driver'),
            )
            ->setName(
                $data['name'] ?? Str::beforeLast($data['original_file_name'], '.'),
            )
            ->preservingOriginal()
            ->toMediaCollection($mediaCollection);

<<<<<<< HEAD
<<<<<<< HEAD
        $user_id = Filament::auth()->id();
        $attachment->update([
            'created_by' => $user_id,
            'updated_by' => $user_id,
=======
        $user_id=Filament::auth()->id();
        $attachment->update([
            'created_by'=>$user_id,
            'updated_by'=>$user_id,
>>>>>>> 87803b1 (up)
=======
        $user_id = Filament::auth()->id();
        $attachment->update([
            'created_by' => $user_id,
            'updated_by' => $user_id,
>>>>>>> f54fd74 (Check & fix styling)
        ]);
        /*
        $attachment->created_by=$user_id;
        $attachment->created_by=$user_id;
        $attachment->save();
        */
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 87803b1 (up)
=======
>>>>>>> f54fd74 (Check & fix styling)
    }
}
