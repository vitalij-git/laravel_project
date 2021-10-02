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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('authors')->group(function(){
    Route::get('','AuthorController@index')->name('author.index');
    Route::get('create', 'AuthorController@create')->name('author.create');
    Route::post('store', 'AuthorController@store')->name('author.store');
});
Route::prefix('book_items')->group(function(){
    Route::get('','BookItemController@index')->name('book_items.index');
    Route::get('create', 'BookItemController@create')->name('book_items.create');
    Route::post('store', 'BookItemController@store')->name('book_items.store');
});
