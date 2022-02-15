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

//シンプルチャット追加
Route::get("posts", 'PostController@index')->name('post.index');
Route::post("posts/create", 'PostController@create')->name('post.create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
