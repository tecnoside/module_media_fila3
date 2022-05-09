<?php

namespace Modules\Media\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Contracts\RowsContract;
//--- Services --

use Modules\Xot\Models\Panels\XotBasePanel;

class SpatieImagePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = 'Modules\Media\Models\SpatieImage';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = array (
);

    /**
     * The relationships that should be eager loaded on index queries.
     *
     */
    public function with():array {
        return [];
    }

    public function search() :array {

        return [];
    }

    /**
     * on select the option id
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @param Modules\Media\Models\SpatieImage $row
     *
     * @return int|string|null
     */
    public function optionId($row) {
        return $row->getKey();
    }

    /**
     * on select the option label.
     */
    public function optionLabel($row):string {
        return (string)$row->title;
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
    public static function indexQuery(array $data, $query)
    {
        //return $query->where('user_id', $request->user()->id);
        return $query;
    }



    /**
     * Get the fields displayed by the resource.
     *
     * @return array
        'col_size' => 6,
        'sortable' => 1,
        'rules' => 'required',
        'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
        'value'=>'..',
     */
    public function fields(): array {
        return array (
  0 => 
  (object) array(
     'type' => 'Id',
     'name' => 'id',
     'comment' => NULL,
  ),
  1 => 
  (object) array(
     'type' => 'String',
     'name' => 'model_type',
     'rules' => 'required',
     'comment' => NULL,
  ),
  2 => 
  (object) array(
     'type' => 'Bigint',
     'name' => 'model_id',
     'rules' => 'required',
     'comment' => NULL,
  ),
  3 => 
  (object) array(
     'type' => 'String',
     'name' => 'uuid',
     'comment' => NULL,
  ),
  4 => 
  (object) array(
     'type' => 'String',
     'name' => 'collection_name',
     'rules' => 'required',
     'comment' => NULL,
  ),
  5 => 
  (object) array(
     'type' => 'String',
     'name' => 'name',
     'rules' => 'required',
     'comment' => NULL,
  ),
  6 => 
  (object) array(
     'type' => 'String',
     'name' => 'file_name',
     'rules' => 'required',
     'comment' => NULL,
  ),
  7 => 
  (object) array(
     'type' => 'String',
     'name' => 'mime_type',
     'comment' => NULL,
  ),
  8 => 
  (object) array(
     'type' => 'String',
     'name' => 'disk',
     'rules' => 'required',
     'comment' => NULL,
  ),
  9 => 
  (object) array(
     'type' => 'String',
     'name' => 'conversions_disk',
     'comment' => NULL,
  ),
  10 => 
  (object) array(
     'type' => 'Bigint',
     'name' => 'size',
     'rules' => 'required',
     'comment' => NULL,
  ),
  11 => 
  (object) array(
     'type' => 'Json',
     'name' => 'manipulations',
     'rules' => 'required',
     'comment' => NULL,
  ),
  12 => 
  (object) array(
     'type' => 'Json',
     'name' => 'custom_properties',
     'rules' => 'required',
     'comment' => NULL,
  ),
  13 => 
  (object) array(
     'type' => 'Json',
     'name' => 'generated_conversions',
     'rules' => 'required',
     'comment' => NULL,
  ),
  14 => 
  (object) array(
     'type' => 'Json',
     'name' => 'responsive_images',
     'rules' => 'required',
     'comment' => NULL,
  ),
  15 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'order_column',
     'comment' => NULL,
  ),
  16 => 
  (object) array(
     'type' => 'Datetime',
     'name' => 'created_at',
     'comment' => NULL,
  ),
  17 => 
  (object) array(
     'type' => 'Datetime',
     'name' => 'updated_at',
     'comment' => NULL,
  ),
  18 => 
  (object) array(
     'type' => 'String',
     'name' => 'created_by',
     'comment' => NULL,
  ),
  19 => 
  (object) array(
     'type' => 'String',
     'name' => 'updated_by',
     'comment' => NULL,
  ),
);
    }

    /**
     * Get the tabs available.
     *
     * @return array
     */
    public function tabs():array {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request):array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request = null):array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request):array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions():array {
        return [];
    }
}
