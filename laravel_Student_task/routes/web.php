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
Route::prefix('students')->group(function(){
    Route::get('','StudentController@index')->name('student.index')->middleware("auth");
    Route::get('create', 'StudentController@create')->name('student.create')->middleware("auth");
    Route::post('store', 'StudentController@store')->name('student.store')->middleware("auth");
    Route::get('edit/{student}', 'StudentController@edit')->name('student.edit')->middleware("auth");
    Route::post('update/{student}', 'StudentController@update')->name('student.update')->middleware("auth");
    Route::post('delete/{student}','StudentController@destroy')->name('student.destroy')->middleware("auth");
    Route::get('show/{student}', 'StudentController@show')->name('student.show')->middleware("auth");
});
Route::prefix('schools')->group(function(){
    Route::get('','SchoolController@index')->name('school.index')->middleware("auth");
    Route::get('create', 'SchoolController@create')->name('school.create')->middleware("auth");
    Route::post('store', 'SchoolController@store')->name('school.store')->middleware("auth");
    Route::get('edit/{school}', 'SchoolController@edit')->name('school.edit')->middleware("auth");
    Route::post('update/{school}', 'SchoolController@update')->name('school.update')->middleware("auth");
    Route::post('delete/{school}','SchoolController@destroy')->name('school.destroy')->middleware("auth");
    Route::get('show/{school}', 'SchoolController@show')->name('school.show')->middleware("auth");
});
Route::prefix('attendance_groups')->group(function(){
    Route::get('','AttendanceGroupController@index')->name('attendance_group.index')->middleware("auth");
    Route::get('create', 'AttendanceGroupController@create')->name('attendance_group.create')->middleware("auth");
    Route::post('store', 'AttendanceGroupController@store')->name('attendance_group.store')->middleware("auth");
    Route::get('edit/{attendance_group}', 'AttendanceGroupController@edit')->name('attendance_group.edit')->middleware("auth");
    Route::post('update/{attendance_group}', 'AttendanceGroupController@update')->name('attendance_group.update')->middleware("auth");
    Route::post('delete/{attendance_group}','AttendanceGroupController@destroy')->name('attendance_group.destroy')->middleware("auth");
    Route::get('show/{attendance_group}', 'AttendanceGroupController@show')->name('attendance_group.show')->middleware("auth");
});
