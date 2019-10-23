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

// Route for HomePage
Route::get('/', 'registerActivityController@show');
Route::get('notifySuccess', function () {
    return view('notifySuccess');
});
// Route for Login
Route::get('login', 'Controller@getLogin');
Route::post('login', ['as' => 'login', 'uses' => 'Controller@postLogin']);
Route::get('logout', 'Controller@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::get('/', 'Controller@showDashboard');
    Route::get('dashboard', 'Controller@showDashboard');

    // Route for Activities
    Route::group(['prefix' => 'activities'], function () {
        Route::get('/', ['as' => 'activities', 'uses' => 'activitiesController@show']);
        Route::get('add', 'activitiesController@add');
        Route::post('save', ['as' => 'saveActivity', 'uses' => 'activitiesController@save']);
        Route::get('edit/{id}', 'activitiesController@edit');
        Route::post('update', ['as' => 'editActivity', 'uses' => 'activitiesController@update']);
        Route::get('delete/{id}', 'activitiesController@remove');
    });

    // Route for locations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/', ['as' => 'locations', 'uses' => 'locationsController@show']);
        Route::get('add', 'locationsController@add');
        Route::post('save', ['as' => 'saveLocation', 'uses' => 'locationsController@save']);
        Route::get('edit/{id}', 'locationsController@edit');
        Route::post('update', ['as' => 'editLocation', 'uses' => 'locationsController@update']);
        Route::get('delete/{id}', 'locationsController@remove');
    });

    // Route for types user
    Route::group(['prefix' => 'typesuser'], function () {
        Route::get('/', ['as' => 'typesuser', 'uses' => 'typesUserController@show']);
        Route::get('add', 'typesUserController@add');
        Route::post('save', ['as' => 'saveTypesUser', 'uses' => 'typesUserController@save']);
        Route::get('edit/{id}', 'typesUserController@edit');
        Route::post('update', ['as' => 'editTypesUser', 'uses' => 'typesUserController@update']);
        Route::get('delete/{id}', 'typesUserController@remove');
    });

    // Route for users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users', 'uses' => 'userController@show']);
        Route::get('add', 'userController@add');
        Route::post('save', ['as' => 'saveUser', 'uses' => 'userController@save']);
        Route::get('edit/{id}', 'userController@edit');
        Route::post('update', ['as' => 'editUser', 'uses' => 'userController@update']);
        Route::get('delete/{id}', 'userController@remove');
    });
});
