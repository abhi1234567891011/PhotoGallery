<?php

use App\Http\Controllers\AlbumsController;
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

Route::get('/albums','\App\Http\Controllers\AlbumsController@index');

Route::get('/albums/create','\App\Http\Controllers\AlbumsController@create');

Route::post('/albums/store','\App\Http\Controllers\AlbumsController@store');

Route::get('/albums/{id}','\App\Http\Controllers\AlbumsController@show');

Route::get('/photos/create/{album_id}','\App\Http\Controllers\PhotosController@create');

Route::post('/photos/store','\App\Http\Controllers\PhotosController@store');

Route::get('/photos/{id}','\App\Http\Controllers\PhotosController@show');

Route::post('/photos/{id}','\App\Http\Controllers\PhotosController@destroy');



