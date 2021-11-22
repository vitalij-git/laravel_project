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
Route::prefix('companies')->group(function(){
    Route::get('','CompanyController@index')->name('company.index');
    Route::get('create', 'CompanyController@create')->name('company.create');
    Route::post('store', 'CompanyController@store')->name('company.store');
    Route::get('edit/{company}', 'CompanyController@edit')->name('company.edit');
    Route::post('update/{company}', 'CompanyController@update')->name('company.update');
    Route::post('delete/{company}','CompanyController@destroy')->name('company.destroy');
    Route::get('show/{company}', 'CompanyController@show')->name('company.show');
});
Route::prefix('clients')->group(function(){
    Route::get('','ClientController@index')->name('client.index');
    Route::get('create', 'ClientController@create')->name('client.create');
    Route::post('store', 'ClientController@store')->name('client.store');
    Route::post('delete/{client}', 'ClientController@destroy')->name('client.destroy');
    Route::get('edit/{client}', 'ClientController@edit')->name('client.edit');
    Route::post('update/{client}', 'ClientController@update')->name('client.update');
    Route::get('show/{client}', 'ClientController@show')->name('client.show');
    });
