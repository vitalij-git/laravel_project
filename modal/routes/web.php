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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('articles')->group(function () {
    Route::get('','ArticleController@index')->name('article.index');
    Route::post('storeAjax', 'ArticleController@storeAjax')->name('article.storeAjax');
    Route::post('updateAjax/{article}', 'ArticleController@updateAjax')->name('article.updateAjax');
    Route::get('editAjax/{article}', 'ArticleController@editAjax')->name('article.editAjax');
    Route::get('showAjax/{article}', 'ArticleController@showAjax')->name('article.showAjax');
    Route::get('searchAjax', 'ArticleController@searchAjax') ->name('article.searchAjax');
    Route::get('filterAjax', 'ArticleController@filterAjax') ->name('article.filterAjax');
    Route::get('indexAjax', 'ArticleController@indexAjax') ->name('article.indexAjax');
    Route::post('selectedDelete', 'ArticleController@selectedDelete') ->name('article.selectedDelete');
});
Route::prefix('types')->group(function () {
    Route::get('','TypeController@index')->name('type.index');
    Route::post('storeAjax', 'TypeController@storeAjax')->name('type.storeAjax');
    Route::post('updateAjax/{type}', 'TypeController@updateAjax')->name('type.updateAjax');
    Route::get('editAjax/{type}', 'TypeController@editAjax')->name('type.editAjax');
    Route::get('showAjax/{type}', 'TypeController@showAjax')->name('type.showAjax');
    Route::get('searchAjax', 'TypeController@searchAjax') ->name('type.searchAjax');
    Route::get('filterAjax', 'TypeController@filterAjax') ->name('type.filterAjax');
    Route::get('indexAjax', 'TypeController@indexAjax') ->name('type.indexAjax');
});
