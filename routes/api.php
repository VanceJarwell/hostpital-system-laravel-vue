<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//LOGIN
Route::middleware('throttle')->group( function () {
	Route::post('/login', 'AuthController@login')->name('login');
});

Route::middleware('auth:api')->group(function(){
	Route::post('/logout','AuthController@logout')->name('logout');
	Route::get('/user/profile','UserController@profile')->name('user.profile');
	#DASHBOARD
	Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
	#NURSE
	Route::post('/nurse/add', 'NurseController@addNurse')->name('nurse.add');
	Route::get('/nurse/get-data', 'NurseController@getNurseData')->name('nurse.data');
	Route::post('/nurse/delete', 'NurseController@deleteNurse')->name('nurse.delete');
	#DEPARTMENT
	Route::post('/department/add', 'DepartmentController@addDepartment')->name('department.add');
	Route::post('/department/add-description', 'DepartmentController@addDescription')->name('department.add-description');
	Route::get('/department/get-data', 'DepartmentController@getDepartmentData')->name('department.data');
	Route::post('/department/delete', 'DepartmentController@deleteDepartment')->name('department.delete');
	#BUILDING
	Route::post('building/add', 'BuildingController@addBuidling')->name('building.add');
	Route::get('building/get-data', 'BuildingController@getBuildingData')->name('building.data');
	Route::post('building/delete', 'BuildingController@deleteBuilding')->name('building.delete');
	#ROOM
	Route::post('room/add', 'RoomController@addRoom')->name('room.add');
	Route::get('room/get-data', 'RoomController@getRoomData')->name('room.data');
	Route::post('room/delete', 'RoomController@deleteRoom')->name('room.delete');
	#PHYSICIAN
	Route::get('/physician/get','PhysicianController@index')->name('physician');
	Route::post('/physician/add','PhysicianController@store')->name('physician.add');
	Route::post('/physician/delete','PhysicianController@destroy')->name('physician.delete');
	#PATIENT
	Route::post('/patient/add','PatientController@store')->name('patient.add');
	Route::get('/patient/get','PatientController@index')->name('patient.get');
	Route::get('/patient/delete','PatientController@destroy')->name('patient.delete');
	#SCHEDULE
	Route::post('/schedule_procedure/add','AppointmentController@store')->name('schedule_procedure.add');
	Route::get('/schedule_procedure/get','AppointmentController@index')->name('schedule_procedure.get');
	Route::get('/schedule_procedure/delete','AppointmentController@destroy')->name('schedule_procedure.delete');
	#PROCEDURE
	Route::post('/procedure_category/add','CategoryProcedureController@store')->name('procedure_category.add');
	Route::get('/procedure_category/get','CategoryProcedureController@index')->name('procedure_category.get');
	Route::get('/procedure_category/delete','CategoryProcedureController@destroy')->name('procedure_category.delete');
});
