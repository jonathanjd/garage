<?php

use Illuminate\Http\Request;

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

Route::apiResource('/type-garage', 'TypeGarageController');
Route::apiResource('/state', 'StateController', ['only' => 'index']);
Route::get('/search/code/{code}', 'SearchController@searchCode');