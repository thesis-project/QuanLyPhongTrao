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

use App\Http\Controllers\activitiesController;

Route::get('/', function () {
    return view('index');
});

Route::get('/activities',['as'=>'activities', 'uses'=>'activitiesController@show'] );
Route::get('/activities/add', 'activitiesController@add');
Route::post('/activities/save',['as'=>'save','uses'=>'activitiesController@save'] );
Route::get('/activities/edit/{id}', 'activitiesController@edit');
Route::post('/activities/save_edit',['as'=>'save_edit','uses'=>'activitiesController@save_edit'] );
Route::get('/activities/delete/{id}', 'activitiesController@remove');

Route::get('/locations',['as'=>'locations', 'uses'=>'locationsController@show'] );
Route::get('locations/add', 'locationsController@add');
Route::post('/locations/save',['as'=>'save','uses'=>'locationsController@save'] );
Route::get('/locations/edit/{id}', 'locationsController@edit');
Route::post('/locations/save_edit',['as'=>'save_edit','uses'=>'locationsController@save_edit'] );
Route::get('/locations/delete/{id}', 'locationsController@remove');

Route::get('/users', function () {
    return view('users');
});
