<?php

<<<<<<< HEAD
declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/stream/{media}', 'StreamController');
Route::get('/streamsnip/{media}', 'StreamsnipController');
=======
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('media')->group(function() {
    Route::get('/', 'MediaController@index');
});
>>>>>>> c8055c5 (first commit)
