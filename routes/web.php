<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'TamuController@show')->name('index');
Route::get('/detail/{id}', 'TamuController@detail')->name('detail');
Route::get('/search', 'TamuController@search')->name('search');
Route::get('/admin/search', 'BeritaController@searchmin')->name('admin.search');
Route::get('/admin', 'BeritaController@index1')->name('admin');
Route::get('/admin/create', 'BeritaController@create')->name('admin.create');
Route::post('/admin', 'BeritaController@store')->name('admin.store');
Route::get('/admin/edit/{id}', 'BeritaController@edit')->name('admin.edit');
Route::post('/admin/update/{id}', 'BeritaController@update')->name('admin.update');
Route::post('/admin/delete/{id}', 'BeritaController@destroy')->name('admin.destroy');


Auth::routes([
    'register' => false,
    'reset'    => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
