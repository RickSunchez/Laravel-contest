<?php

use App\Http\Controllers\VideogamesController;
use App\Http\Requests\VideogameCreate;
use App\Http\Requests\VideogameDelete;
use App\Http\Requests\VideogameRead;
use App\Http\Requests\VideogameUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post(
    '/create',
    [VideogamesController::class, 'create']
)->middleware('tags');

Route::get(
    '/read', 
    [VideogamesController::class, 'read']
)->middleware('tags');

Route::put(
    '/update', 
    [VideogamesController::class, 'update']
)->middleware('tags');

Route::delete(
    '/delete', 
    [VideogamesController::class, 'delete']
);


Route::get(
    '/tags',
    [VideogamesController::class, 'tags']
);