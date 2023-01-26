<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Xot\Contracts\RowsContract;

class MediaPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Media\Models\Media';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     */
    public function with(): array
    {
        return [];
    }

    public function search(): array
    {
        return [];
    }

    /**
     * on select the option id.
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @param Modules\Media\Models\Media $row
     *
     * @return int|string|null
     */
    public function optionId($row)
    {
        $key = $row->getKey();
        if (null === $key || (! is_string($key) && ! is_int($key))) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        return $key;
    }

    /**
     * on select the option label.
     *
     * @param Modules\Media\Models\Media $row
     */
    public function optionLabel($row): string
    {
        return 'To Set';
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?Renderable
    {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public static function indexQuery(array $data, $query)
    {
        // return $query->where('user_id', $request->user()->id);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'model_type',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'Integer',
                'name' => 'model_id',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'uuid',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'collection_name',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'name',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'file_name',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'mime_type',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'disk',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'conversions_disk',
                'comment' => null,
            ],

            (object) [
                'type' => 'Integer',
                'name' => 'size',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'Json',
                'name' => 'manipulations',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'Json',
                'name' => 'custom_properties',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'Json',
                'name' => 'generated_conversions',
                'rules' => 'required',
                'comment' => null,
            ],

            (object) [
                'type' => 'Json',
                'name' => 'responsive_images',
                'rules' => 'required',
                'comment' => null,
            ],

            /*
            (object) [
                'type' => 'Integer',
                'name' => 'order_column',
                'comment' => null,
            ],
            */
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [];
    }
}
