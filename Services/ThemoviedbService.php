<?php

declare(strict_types=1);

namespace Modules\Media\Services;

use Illuminate\Support\Facades\Http;

class ThemoviedbService {
    public static string $token = '';

    public static function getToken(): string {
        if ('' === self::$token) {
            self::$token = config('services.tmdb.token');
        }

        return self::$token;
    }

    /**
     * @return array
     */
    public static function getGenresMovie() {
        // https://developers.themoviedb.org/3/genres/get-movie-list

        $url = 'https://api.themoviedb.org/3/genre/movie/list?api_key='.self::getToken().'&language=en-US';

        $genres = Http::withToken(self::getToken())
        ->get($url)
        ->json()['genres'];

        $opts = [];

        foreach ($genres as $row) {
            $id = $row['id'];
            $label = $row['name'];

            $opts[$id] = $label;
        }

        return $opts;
    }
}
