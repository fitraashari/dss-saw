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
    Route::post('criteria/store','CriteriaController@store')->name('criteria.store');
    Route::get('criteria/{id}','CriteriaController@show')->name('criteria.show');
    Route::get('criteria/{id}/edit','CriteriaController@edit')->name('criteria.edit');
    Route::put('criteria/{id}/update','CriteriaController@update')->name('criteria.update');
    Route::delete('criteria/{criteria}/delete','CriteriaController@destroy')->name('criteria.delete');

    Route::post('sub_criteria/store','SubCriteriaController@store')->name('sub_criteria.store');
    Route::delete('sub_criteria/{sub_criteria}/delete','SubCriteriaController@destroy')->name('sub_criteria.delete');
    Route::get('sub_criteria/{id}/edit','SubCriteriaController@edit')->name('sub_criteria.edit');
    Route::put('sub_criteria/{id}/update','SubCriteriaController@update')->name('sub_criteria.update');

    Route::get('assessment','AssessmentController@index')->name('assessment');
    Route::post('assessment/store','AssessmentController@store')->name('assessment.store');
    Route::get('assessment/export','AssessmentController@export')->name('assessment.export');

    Route::get('employe','EmployeController@index')->name('employe');
    Route::get('employe/create','EmployeController@create')->name('employe.create');
    Route::post('employe/store','EmployeController@store')->name('employe.store');
    Route::get('employe/{id}','EmployeController@show')->name('employe.show');
    Route::get('employe/{id}/edit','EmployeController@edit')->name('employe.edit');
    Route::put('employe/{id}/update','EmployeController@update')->name('employe.update');
    Route::delete('employe/{id}/delete','EmployeController@destroy')->name('employe.delete');
    
});
