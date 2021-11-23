<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
})->middleware("auth");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('categories')->group(function(){
    Route::get('','CategoryController@index')->name('category.index')->middleware("auth");
    Route::get('create', 'CategoryController@create')->name('category.create')->middleware("auth");
    Route::post('store', 'CategoryController@store')->name('category.store')->middleware("auth");
    Route::get('edit/{category}', 'CategoryController@edit')->name('category.edit')->middleware("auth");
    Route::post('update/{category}', 'CategoryController@update')->name('category.update')->middleware("auth");
    Route::post('delete/{category}','CategoryController@destroy')->name('category.destroy')->middleware("auth");
    Route::Get('show/{category}','CategoryController@show')->name('category.show')->middleware("auth");
});

Route::prefix('posts')->group(function(){
    Route::get('','PostController@index')->name('post.index')->middleware("auth");
    Route::get('create', 'PostController@create')->name('post.create')->middleware("auth");
    Route::post('store', 'PostController@store')->name('post.store')->middleware("auth");
    Route::get('edit/{post}', 'PostController@edit')->name('post.edit')->middleware("auth");
    Route::post('update/{post}', 'PostController@update')->name('post.update')->middleware("auth");
    Route::post('delete/{post}','PostController@destroy')->name('post.destroy')->middleware("auth");
});
