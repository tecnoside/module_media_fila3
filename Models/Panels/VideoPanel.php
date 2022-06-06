<?php

declare(strict_types=1);

namespace Modules\Media\Models\Panels;

use Illuminate\Http\Request;
// --- Services --

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

    // forse meglio un mutator?
    public function txt(): ?string {
        return optional($this->row)->overview;
    }

    // forse meglio un mutator?
    public function voteAverage(): float {
        return (optional($this->row)->vote_average * 5) / 10;
    }

    /**
     * @return array
     */
    public function optionsSelect() {
        // dddx(xotModel('tag')::all()->isEmpty());

        return ThemoviedbService::getGenresMovie();
    }
}
