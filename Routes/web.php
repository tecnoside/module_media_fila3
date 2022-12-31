<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/stream/{media}', 'StreamController');
// Route::get('/streamsnip/{media}', 'StreamsnipController');
