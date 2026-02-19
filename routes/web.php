<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

/* Route::get('/', function () { */
/*     return view('home'); */
/* }); */

Route::get('/', [ProjectController::class, 'show']);
