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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('clients')->group(function(){
Route::get('','ClientController@index')->name('client.index');
Route::get('createclient', 'ClientController@create')->name('client.createclient');
Route::get('createclients', 'ClientController@createClients')->name('client.createclients');
Route::get('createjs', 'ClientController@createWithJS')->name('client.createclientjs');
Route::post('store', 'ClientController@store')->name('client.store');
});
