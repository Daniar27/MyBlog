<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/account/{id}', 'App\Http\Controllers\HomeController@account');
Route::get('/home/blog/{id_blog}', 'App\Http\Controllers\HomeController@blog');
Route::get('/home/add', 'App\Http\Controllers\HomeController@tambah');
Route::post('/home/save/{id}', 'App\Http\Controllers\HomeController@simpan');
Route::get('/home/account/delete/{id}', 'App\Http\Controllers\HomeController@delete');
Route::get('/home/account/edit/{id}', 'App\Http\Controllers\HomeController@edit');
Route::post('/home/update/{id}', 'App\Http\Controllers\HomeController@update');
Route::get('/search', 'App\Http\Controllers\HomeController@search');
Route::get('/home/info/{id}', 'App\Http\Controllers\HomeController@info');


