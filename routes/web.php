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

Route::get('/', function () {
    return view('home');
})->name('home');

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

Route::get('login', function () {
    return view('login');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});