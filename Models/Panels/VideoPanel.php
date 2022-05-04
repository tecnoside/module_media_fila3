<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels;

use Illuminate\Http\Request;
//--- Services --

use Modules\Media\Services\ThemoviedbService;
use Modules\Xot\Models\Panels\XotBasePanel;

class VideoPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Media\Models\Panels\VideoPanel';

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
     *
     * @var array
     */
    public function with(): array {
        return [];
    }

    public function search(): array {
        return [];
    }

    /**
     * on select the option id.
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     */
    public function optionId(object $row) {
        return $row->getKey();
    }

    /**
     * on select the option label.
     */
    public function optionLabel(object $row): string {
        return $row->area_define_name;
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
        //return $query->where('user_id', $request->user()->id);
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
                'type' => 'Image',
                'name' => 'poster_path',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'title',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'original_name',
                'comment' => null,
            ],
            (object) [
                'type' => 'Checkbox',
                'name' => 'adult',
                'comment' => null,
            ],
            /*
            (object) [
                'type' => 'Video',
                'name' => 'video',
                'comment' => null,
            ],
            */
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array {
        $tabs_name = ['tags'];

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
        return [
            new Actions\DownloadVideoAction(),
        ];
    }

    //forse meglio un mutator?
    public function txt(): ?string {
        return optional($this->row)->overview;
    }

    //forse meglio un mutator?
    public function voteAverage(): float {
        return (optional($this->row)->vote_average * 5) / 10;
    }

    /**
     * @return array
     */
    public function optionsSelect() {
        //dddx(xotModel('tag')::all()->isEmpty());

        return ThemoviedbService::getGenresMovie();
    }
}
