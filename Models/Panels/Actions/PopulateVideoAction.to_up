<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Media\Models\Panels\Actions;

// -------- services --------

use Illuminate\Support\Facades\Http;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Media\Jobs\DownloadVideo;
use Modules\Media\Models\Video;
use Modules\UI\Services\ThemeService;

// -------- bases -----------

/**
 * Class PopulateVideoAction.
 */
class PopulateVideoAction extends XotBasePanelAction {
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-file-import"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        $drivers = [
            'tmdb',
        ];
        $i = request('i', 0);

        $view = ThemeService::getView();
        $driver = isset($drivers[$i]) ? $drivers[$i] : null;

        if (isset($driver)) {
            return $this->{$driver}();
        }

        $view_params = [
            'view' => $view,
            'drivers' => $drivers,
            'driver' => $driver,
        ];

        return view()->make($view, $view_params);
    }

    public function tmdb(): string {
        /**
         * @var string
         */
        $token = config('services.tmdb.token');
        // $url = 'https://api.themoviedb.org/3/discover/movie?api_key=MY_API_KEY&with_genres=53';
        $url = 'https://api.themoviedb.org/3/movie/popular';

        // https://image.tmdb.org/t/p/w500' . $movie['poster_path']

        $popular = Http::withToken($token)
            ->get($url)
            ->json();

        if (! isset($popular['results'])) {
            dddx($popular);
        }
        /**
         * @var array
         */
        $rows = $popular['results'];
        foreach ($rows as $row) {
            $url = 'http://api.themoviedb.org/3/movie/'.$row['id'].'/videos';
            // $url = 'http://api.themoviedb.org/3/movie/157336?append_to_response=videos';
            $video = Http::withToken($token)
            ->get($url)
            ->json();
            // dddx($video['results'][0]);
            $first_video = $video['results'][0];

            /**
             * @var array
             */
            $row = collect($row)
                ->except(['id', 'genre_ids'])
                ->all();
            $row['poster_path'] = 'https://image.tmdb.org/t/p/w500'.$row['poster_path'];
            switch ($first_video['site']) {
                case 'YouTube':
                    $row['url'] = 'https://www.youtube.com/watch?v='.$first_video['key'];
                    break;
                default:
                    dddx($first_video);
                    break;
            }

            $video = Video::create($row);

            // DownloadVideo::dispatch($video);
        }

        return '<h3>+Done</h3>';
    }
}
