<?php

declare(strict_types=1);

namespace Modules\Media\Models;

use Modules\Tag\Models\Traits\HasTagTrait;

/**
 * Video.
 */
class Video extends BaseModel {
    use HasTagTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'adult', 'backdrop_path', 'original_language', 'original_name',
        'overview', 'popularity', 'poster_path', 'release_date', 'title', 'video',
        'vote_average', 'vote_count',
        'url', 'status', 'info',
    ];

    protected $dates = [
        'converted_for_downloading_at',
        'converted_for_streaming_at',
    ];

    protected $guarded = [];
}

/*
    "adult" => false
    "backdrop_path" => "/tutaKitJJIaqZPyMz7rxrhb4Yxm.jpg"
    "genre_ids" => array:4 [▶]
    "id" => 438695
    "original_language" => "en"
    "original_title" => "Sing 2"
    "overview" => "Buster and his new cast now have their sights set on debuting a new show at the Crystal Tower Theater in glamorous Redshore City. But with no connections, he an ▶"
    "popularity" => 8721.933
    "poster_path" => "https://image.tmdb.org/t/p/w500/aWeKITRFbbwY8txG5uCj4rMCfSP.jpg"
    "release_date" => "2021-12-01"
    "title" => "Sing 2"
    "video" => false
    "vote_average" => 7.5
    "vote_count" => 244
    "url" => "https://www.youtube.com/watch?v=wo2myV-7la4"
 */
