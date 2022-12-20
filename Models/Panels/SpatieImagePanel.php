<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels;

use Illuminate\Http\Request;
use Modules\Media\Models\SpatieImage;
// --- Services --

use Modules\Xot\Contracts\RowsContract;
use Modules\Cms\Models\Panels\XotBasePanel;

class SpatieImagePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = SpatieImage::class;

    public SpatieImage $row;

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * on select the option label.
     *
     * @param SpatieImage $row
     */
    public function optionLabel($row): string {
        return (string) $row->title;
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?\Illuminate\Contracts\Support\Renderable {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public static function indexQuery(array $data, $query) {
        // return $query->where('user_id', $request->user()->id);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array {
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
                'type' => 'Bigint',
                'name' => 'model_id',
                'rules' => 'required',
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
                'type' => 'Tags',
                'name' => 'tags',
                'col_size' => 12,
                'options' => ['domains'],
            ],
            /*
            (object) [
                'type' => 'String',
                'name' => 'uuid',
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
                'type' => 'Bigint',
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
            (object) [
                'type' => 'Integer',
                'name' => 'order_column',
                'comment' => null,
            ],
            (object) [
                'type' => 'DateDateTime',
                'name' => 'created_at',
                'comment' => null,
            ],
            (object) [
                'type' => 'DateDateTime',
                'name' => 'updated_at',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'created_by',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'updated_by',
                'comment' => null,
            ],
            */
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array {
        return [];
    }
}
