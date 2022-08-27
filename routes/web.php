<?php

use App\Http\Controllers\VideogamesPage;
use Illuminate\Support\Facades\Route;

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

Route::get(
    '/',
    [VideogamesPage::class, 'main']
);

Route::get(
    '/delete/{id}',
    [VideogamesPage::class, 'delete']
);

Route::get(
    '/update/{id}',
    [VideogamesPage::class, 'update']
);

Route::get(
    '/create',
    [VideogamesPage::class, 'create']
);