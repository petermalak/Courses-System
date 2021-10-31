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
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name("dashboard");
    Route::resource('courses', 'CoursesController');
    Route::resource('lectures', 'LecturesController');
    Route::resource('references', 'ReferencesController');
    Route::resource('reference-types', 'ReferenceTypesController');
    Route::resource('uploads', 'UploadsController');
});
