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
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('dashboard', function () {
        // Matches The "/admin/dashboard" URL
    });
//    Route::get('/article', 'Admin\ArticleController@index')->name('admin');
    Route::resource('/article', 'Admin\ArticleController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
