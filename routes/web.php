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
    Route::get('filter/{id}', ['as' => 'filterActivities', 'uses' => 'Controller@filterActivities'])->where('id', '[0-9]+');
    Route::post('statistic', ['as' => 'statisticActivity', 'uses' => 'Controller@statistic']);

    // Route for Activities
    Route::group(['prefix' => 'activities'], function () {
        Route::get('/', ['as' => 'activities', 'uses' => 'activitiesController@show']);
        Route::get('add', 'activitiesController@add');
        Route::post('save', ['as' => 'saveActivity', 'uses' => 'activitiesController@save']);
        Route::get('edit/{id}', 'activitiesController@edit')->name('editActivities');
        Route::post('update', ['as' => 'editActivity', 'uses' => 'activitiesController@update']);
        Route::get('delete/{id}', 'activitiesController@remove')->name('deleteActivities');
    });

    // Route for Equipments
    Route::group(['prefix' => 'equipments'], function () {
        Route::get('/', ['as' => 'equipments', 'uses' => 'equipmentsController@show']);
        Route::get('add', 'equipmentsController@add');
        Route::post('save', ['as' => 'saveEquipment', 'uses' => 'equipmentsController@save']);
        Route::get('edit/{id}', 'equipmentsController@edit')->name('editEquipments');
        Route::post('update', ['as' => 'editEquipment', 'uses' => 'equipmentsController@update']);
        Route::get('delete/{id}', 'equipmentsController@remove')->name('deleteEquipments');
    });

    // Route for Equipments Borrowers
    Route::group(['prefix' => 'equipmentsBorrowers'], function () {
        Route::get('/', ['as' => 'equipmentsBorrowers', 'uses' => 'equipmentBorrowerController@show']);
        Route::get('add', 'equipmentBorrowerController@add');
        Route::post('save', ['as' => 'saveEquipmentBorrower', 'uses' => 'equipmentBorrowerController@save']);
        Route::get('edit/{id}', 'equipmentBorrowerController@edit')->name('editEquipmentBorrowers');
        Route::post('update', ['as' => 'editEquipmentBorrower', 'uses' => 'equipmentBorrowerController@update']);
        Route::get('delete/{id}', 'equipmentBorrowerController@remove')->name('deleteEquipmentBorrowers');
    });

    // Route for locations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/', ['as' => 'locations', 'uses' => 'locationsController@show']);
        Route::get('add', 'locationsController@add');
        Route::post('save', ['as' => 'saveLocation', 'uses' => 'locationsController@save']);
        Route::get('edit/{id}', 'locationsController@edit')->name('editLocations');
        Route::post('update', ['as' => 'editLocation', 'uses' => 'locationsController@update']);
        Route::get('delete/{id}', 'locationsController@remove')->name('deleteLocations');
    });

    // Route for Scholastic Semester
    Route::group(['prefix' => 'scholasticSemester'], function () {
        Route::get('/', ['as' => 'scholasticSemester', 'uses' => 'scholasticSemesterController@show']);
        /* Scholastic */
        Route::get('addScholastic', 'scholasticSemesterController@addScholastic');
        Route::post('saveScholastic', ['as' => 'saveScholastic', 'uses' => 'scholasticSemesterController@saveScholastic']);
        Route::get('editScholastic/{id}', 'scholasticSemesterController@editScholastic')->name('editScholastics');
        Route::post('updateScholastic', ['as' => 'editScholastic', 'uses' => 'scholasticSemesterController@updateScholastic']);
        Route::get('deleteScholastic/{id}', 'scholasticSemesterController@removeScholastic')->name('deleteScholastics');
        /* Semester */
        Route::get('addSemester', 'scholasticSemesterController@addSemester');
        Route::post('saveSemester', ['as' => 'saveSemester', 'uses' => 'scholasticSemesterController@saveSemester']);
        Route::get('editSemester/{id}', 'scholasticSemesterController@editSemester')->name('editSemesters');
        Route::post('updateSemester', ['as' => 'editSemester', 'uses' => 'scholasticSemesterController@updateSemester']);
        Route::get('deleteSemester/{id}', 'scholasticSemesterController@removeSemester')->name('deleteSemesters');
    });

    // Route for Departments
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', ['as' => 'departments', 'uses' => 'departmentController@show']);
        Route::get('add', 'departmentController@add');
        Route::post('save', ['as' => 'saveDepartment', 'uses' => 'departmentController@save']);
        Route::get('edit/{id}', 'departmentController@edit')->name('editDepartments');
        Route::post('update', ['as' => 'editDepartment', 'uses' => 'departmentController@update']);
        Route::get('delete/{id}', 'departmentController@remove')->name('deleteDepartments');
    });

    // Route for types user
    Route::group(['prefix' => 'typesuser'], function () {
        Route::get('/', ['as' => 'typesuser', 'uses' => 'typesUserController@show']);
        Route::get('add', 'typesUserController@add');
        Route::post('save', ['as' => 'saveTypesUser', 'uses' => 'typesUserController@save']);
        Route::get('edit/{id}', 'typesUserController@edit')->name('editTypeUser');
        Route::post('update', ['as' => 'editTypesUser', 'uses' => 'typesUserController@update']);
        Route::get('delete/{id}', 'typesUserController@remove')->name('deleteTypeUsers');
    });

    // Route for users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users', 'uses' => 'userController@show']);
        Route::get('add', 'userController@add');
        Route::post('save', ['as' => 'saveUser', 'uses' => 'userController@save']);
        Route::get('edit/{id}', 'userController@edit')->name('editUsers');
        Route::post('update', ['as' => 'editUser', 'uses' => 'userController@update']);
        Route::get('delete/{id}', 'userController@remove')->name('deleteUsers');
    });
});
