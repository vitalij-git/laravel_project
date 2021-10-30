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
    return view('/home')->middleware("auth");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('types')->group(function(){
    Route::get('','TypeController@index')->name('type.index')->middleware("auth");
    Route::get('create', 'TypeController@create')->name('type.create')->middleware("auth");
    Route::post('store', 'TypeController@store')->name('type.store')->middleware("auth");
    Route::get('edit/{type}', 'TypeController@edit')->name('type.edit')->middleware("auth");
    Route::post('update/{type}', 'TypeController@update')->name('type.update')->middleware("auth");
    Route::post('delete/{type}','TypeController@destroy')->name('type.destroy')->middleware("auth");
    Route::get('show/{type}', 'TypeController@show')->name('type.show')->middleware("auth");
    Route::get('search', 'TypeController@search')->name('type.search')->middleware("auth");
});

Route::prefix('tasks')->group(function(){
    Route::get('','TaskController@index')->name('task.index')->middleware("auth");
    Route::get('create', 'TaskController@create')->name('task.create')->middleware("auth");
    Route::post('store', 'TaskController@store')->name('task.store')->middleware("auth");
    Route::get('edit/{task}', 'TaskController@edit')->name('task.edit')->middleware("auth");
    Route::post('update/{task}', 'TaskController@update')->name('task.update')->middleware("auth");
    Route::post('delete/{task}','TaskController@destroy')->name('task.destroy')->middleware("auth");
    Route::get('show/{task}', 'TaskController@show')->name('task.show')->middleware("auth");
    Route::get('search', 'TaskController@search')->name('task.search')->middleware("auth");

});
Route::prefix('paginations')->group(function(){
    Route::get('','PaginationSettingController@index')->name('paginationsetting.index')->middleware("auth");
    Route::get('create', 'PaginationSettingController@create')->name('paginationsetting.create')->middleware("auth");
    Route::post('store', 'PaginationSettingController@store')->name('paginationsetting.store')->middleware("auth");
    Route::get('edit/{paginationsetting}', 'PaginationSettingController@edit')->name('paginationsetting.edit')->middleware("auth");
    Route::post('update/{paginationsetting}', 'PaginationSettingController@update')->name('paginationsetting.update')->middleware("auth");
    Route::post('delete/{paginationsetting}','PaginationSettingController@destroy')->name('paginationsetting.destroy')->middleware("auth");
    Route::get('show/{paginationsetting}', 'PaginationSettingController@show')->name('paginationsetting.show')->middleware("auth");

});

Route::prefix('owners')->group(function(){
    Route::get('','OwnerController@index')->name('owner.index')->middleware("auth");
    Route::get('create', 'OwnerController@create')->name('owner.create')->middleware("auth");
    Route::post('store', 'OwnerController@store')->name('owner.store')->middleware("auth");
    Route::get('edit/{owner}', 'OwnerController@edit')->name('owner.edit')->middleware("auth");
    Route::post('update/{owner}', 'OwnerController@update')->name('owner.update')->middleware("auth");
    Route::get('delete/{owner}','OwnerController@destroy')->name('owner.destroy')->middleware("auth");

});

