<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

use Illuminate\Support\Facades\Route;

Route::get('/stream/{media}', 'StreamController');
// Route::get('/streamsnip/{media}', 'StreamsnipController');

Route::get('/media/videoimg/{sec}', 'MediaVideoImgController@getSecond')->name('media.videoimg.get_second');
>>>>>>> 771f698d (first)
