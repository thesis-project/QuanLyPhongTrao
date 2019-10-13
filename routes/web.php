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

// Route for Index
Route::get('/', function () {
    return view('index');
});

// Route for activities
Route::get('/activities',['as'=>'activities', 'uses'=>'activitiesController@show'] );
Route::get('/activities/add', 'activitiesController@add');
Route::post('/activities/save',['as'=>'saveActivity','uses'=>'activitiesController@save'] );
Route::get('/activities/edit/{id}', 'activitiesController@edit');
Route::post('/activities/update',['as'=>'editActivity','uses'=>'activitiesController@update'] );
Route::get('/activities/delete/{id}', 'activitiesController@remove');

// Route for locations
Route::get('/locations',['as'=>'locations', 'uses'=>'locationsController@show'] );
Route::get('/locations/add', 'locationsController@add');
Route::post('/locations/save',['as'=>'saveLocation','uses'=>'locationsController@save'] );
Route::get('/locations/edit/{id}', 'locationsController@edit');
Route::post('/locations/update',['as'=>'editLocation','uses'=>'locationsController@update'] );
Route::get('/locations/delete/{id}', 'locationsController@remove');

// Route for types user
Route::get('/typesuser',['as'=>'typesuser', 'uses'=>'typesUserController@show'] );
Route::get('/typesuser/add', 'typesUserController@add');
Route::post('/typesuser/save',['as'=>'saveTypesUser','uses'=>'typesUserController@save'] );
Route::get('/typesuser/edit/{id}', 'typesUserController@edit');
Route::post('/typesuser/update',['as'=>'editTypesUser','uses'=>'typesUserController@update'] );
Route::get('/typesuser/delete/{id}', 'typesUserController@remove');

// Route for users
Route::get('/users', function () {
    return view('users');
});


