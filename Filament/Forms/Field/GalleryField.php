<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Forms\Field;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Modules\Media\Models\Media;
use Spatie\MediaLibrary\HasMedia;

class GalleryField extends Repeater
{
    // protected string $view = 'ui::filament.forms.components.tree';

    protected function setUp(): void
    {
        $this->setUp03();
    }

    protected function setUp03(): void
    {
        parent::setUp();
        $this->schema([
            // Forms\Components\TextInput::make('uuid'),
            /*
            Forms\Components\TextInput::make('zibibbo')->default(function ($component, $record, $state) {
                dddx([
                    'component' => $component,
                    'record' => $record,
                    'state' => $state,
                ]);
            }),
            */
            // FileUpload::make('img'),
            // SpatieMediaLibraryFileUpload::make('img')->image(),
            // FileUpload::make('file_name'),
            Forms\Components\SpatieMediaLibraryFileUpload::make('image'),
            Forms\Components\TextInput::make('name'),
            Forms\Components\TextInput::make('collection_name'),
        ]);
    }

    protected function setUp02(): void
    {
        parent::setUp();
        $this->schema([
            Forms\Components\Repeater::make('grupo_fotos')
                ->label('')
                ->reorderable(false)
                ->defaultItems(1)
                ->addActionLabel('Adicionar novo grupo de fotos')
                ->grid(2)
                ->schema(function () {
                    return [
                        SpatieMediaLibraryFileUpload::make('fotos')
                            ->multiple()
                            ->image()
                            ->minFiles(1)
                            ->maxFiles(4)
                            ->helperText('Máximo de 4 imagens por grupo')
                            ->panelLayout(null)
                            ->previewable()
                            ->columns(2)
                            ->openable()
                            ->collection(function (Get $get) {
                                return 'grupo_'.$get('id_for_media');
                            }),
                        Forms\Components\Hidden::make('id_for_media')->default(Str::uuid()->toString()),
                        Forms\Components\TextInput::make('descricao')
                            ->label('Descrição')
                            ->required(),
                    ];
                }),
        ]);
    }

    protected function setUp01(): void
    {
        parent::setUp();
        $this->schema([
            SpatieMediaLibraryFileUpload::make('media_id')
                ->disk('local')
                ->collection('game-image')
                ->visibility('private')
                ->conversion('thumb')
                ->loadStateFromRelationshipsUsing(function (SpatieMediaLibraryFileUpload $component, HasMedia $record) {
                    /** @var Model&HasMedia $record */
                    $files = $record->load('media')->getMedia('game-image')
                        ->where('id', $component->getState())
                        ->take(1)
                        ->mapWithKeys(function (Media $file): array {
                            $uuid = $file->getAttributeValue('uuid');

                            return [$uuid => $uuid];
                        })
                        ->toArray();

                    $component->state($files);
                }),

            Textarea::make('key')->rows(3),

            Textarea::make('value')->rows(3),
        ])->afterStateUpdated(function ($state, callable $set, callable $get, $component, ?HasMedia $record) {
            // dddx(['state' => $state]);
            /*
            "state" => array:1 [▼
            "2e99de27-f6f9-4bec-a186-a5a2e8204977" => array:3 [▼
                "media_id" => []
                "key" => null
                "value" => null
            ]
            */
            // *
            // @see https://www.answeroverflow.com/m/1158821463168659496
            // $this->saveUploadedFileUsing(static function (SpatieMediaLibraryFileUpload $component, TemporaryUploadedFile $file, ?Model $record) {
            // $component->state($media->id);

            //  return $media->id;
            // dddx('a');
            // });
        });
    }
}
