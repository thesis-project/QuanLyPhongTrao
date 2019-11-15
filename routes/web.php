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
Route::get('/', 'registerActivityController@show')->name('registerActivity');
Route::group(['middleware' => 'adminLogin'], function (){
    Route::get('checkAndShowRegisterActivities/{id}', 'registerActivityController@checkAndShowRegisterActivities');
    Route::get('register/{id}', 'registerActivityController@processRegister');
    Route::get('listActivitiesRegisted/{id}', 'registerActivityController@showListActivitiesRegisted')->name('listActivitiesRegisted');
    Route::get('undo/{id}', 'registerActivityController@remove');
});

// Route for Login
Route::get('login', 'Controller@showLogin');
Route::post('login', ['as' => 'login', 'uses' => 'Controller@login']);
Route::get('logout', 'Controller@logout');

// Route for Admin
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::get('/', 'Controller@showDashboard');
    Route::get('dashboard', 'Controller@showDashboard');
    Route::get('students/{id}', 'Controller@showListStudents');

    // Route for Activities
    Route::group(['prefix' => 'activities'], function () {
        Route::get('/', ['as' => 'activities', 'uses' => 'activitiesController@show']);
        Route::get('add', 'activitiesController@add');
        Route::post('save', ['as' => 'saveActivity', 'uses' => 'activitiesController@save']);
        Route::get('edit/{id}', 'activitiesController@edit');
        Route::post('update', ['as' => 'editActivity', 'uses' => 'activitiesController@update']);
        Route::get('delete/{id}', 'activitiesController@remove');
    });

    // Route for Equipments
    Route::group(['prefix' => 'equipments'], function () {
        Route::get('/', ['as' => 'equipments', 'uses' => 'equipmentsController@show']);
        Route::get('add', 'equipmentsController@add');
        Route::post('save', ['as' => 'saveEquipment', 'uses' => 'equipmentsController@save']);
        Route::get('edit/{id}', 'equipmentsController@edit');
        Route::post('update', ['as' => 'editEquipment', 'uses' => 'equipmentsController@update']);
        Route::get('delete/{id}', 'equipmentsController@remove');
    });

    // Route for Equipments Borrowers
    Route::group(['prefix' => 'equipmentsBorrowers'], function () {
        Route::get('/', ['as' => 'equipmentsBorrowers', 'uses' => 'equipmentBorrowerController@show']);
        Route::get('add', 'equipmentBorrowerController@add');
        Route::post('save', ['as' => 'saveEquipmentBorrower', 'uses' => 'equipmentBorrowerController@save']);
        Route::get('edit/{id}', 'equipmentBorrowerController@edit');
        Route::post('update', ['as' => 'editEquipmentBorrower', 'uses' => 'equipmentBorrowerController@update']);
        Route::get('delete/{id}', 'equipmentBorrowerController@remove');
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

    // Route for Scholastic Semester
    Route::group(['prefix' => 'scholasticSemester'], function () {
        Route::get('/', ['as' => 'scholasticSemester', 'uses' => 'scholasticSemesterController@show']);
        /* Scholastic */
        Route::get('addScholastic', 'scholasticSemesterController@addScholastic');
        Route::post('saveScholastic', ['as' => 'saveScholastic', 'uses' => 'scholasticSemesterController@saveScholastic']);
        Route::get('editScholastic/{id}', 'scholasticSemesterController@editScholastic');
        Route::post('updateScholastic', ['as' => 'editScholastic', 'uses' => 'scholasticSemesterController@updateScholastic']);
        Route::get('deleteScholastic/{id}', 'scholasticSemesterController@removeScholastic');
        /* Semester */
        Route::get('addSemester', 'scholasticSemesterController@addSemester');
        Route::post('saveSemester', ['as' => 'saveSemester', 'uses' => 'scholasticSemesterController@saveSemester']);
        Route::get('editSemester/{id}', 'scholasticSemesterController@editSemester');
        Route::post('updateSemester', ['as' => 'editSemester', 'uses' => 'scholasticSemesterController@updateSemester']);
        Route::get('deleteSemester/{id}', 'scholasticSemesterController@removeSemester');
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
