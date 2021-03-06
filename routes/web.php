<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('show/{id}', 'HomeController@show')->name('show');

Route::get('yard-sales', function () {
    return view('yard-sales');
})->name('yard.sales');

Route::get('sale-manage', function () {
    return view('sale-manage');
})->name('sale.manage');

Route::get('tips', function () {
    return view('tips');
})->name('tips');

Route::get('contact', function () {
    return view('contacto');
})->name('contact');

Route::get('send-email', 'HomeController@mail')->name('send.email');

Route::get('search', 'HomeController@search')->name('search');
Route::get('/api/search/garages/{search}', 'HomeController@apiSearchGarage');

Route::get('address/{address}', 'HomeController@address')->name('address');
Route::get('/api/address/{address}', 'HomeController@searchAddress');

Route::get('/api/search/user/logging', 'SearchController@searchUserLogging');
Route::get('/api/search/user/email/verificar/{email}', 'SearchController@verificarEmail');

Route::post('/api/garage', 'GarageOffController@store');
Route::get('/api/garage/show/{id}', 'GarageOffController@show');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/api/garage/by-user', 'GarageController@byUser');
    Route::apiResource('/api/garage', 'GarageController');
    Route::apiResource('garage.image', 'GarageImageController');
});