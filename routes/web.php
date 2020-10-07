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


Route::middleware(['auth.basic'])->prefix('dashboard')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('criteria','CriteriaController@index')->name('criteria');
    Route::delete('criteria/{criteria}/delete','CriteriaController@destroy')->name('criteria-delete');
});
