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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Routes Patient
 */
Route::group(['middleware' => 'auth', 'prefix' => 'patients', 'as' => 'patient.'], function()
{
    Route::get('/', 'PatientController@index')->name('index')->middleware('permission:list patients');
    Route::get('create', 'PatientController@create')->name('create')->middleware('permission:create patients');
    Route::post('create', 'PatientController@store')->name('store')->middleware('permission:create patients');
});