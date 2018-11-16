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



Route::get('create','frontend\ImageController@create');
Route::post('create','frontend\ImageController@store');
Route::post('/images-delete', 'frontend\ImageController@destroy');
Route::get('/images-show', 'frontend\ImageController@index');
