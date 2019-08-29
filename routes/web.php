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
    return view('auth.login'); 
});

Auth::routes();

Route::group(['middleware' => ['disablepreventback','auth']],function(){

    Route::resource('medicalcase', 'MedicalCaseController');
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('user','UsersController');
    Route::get('editprofile','UsersController@editprofile');
    Route::get('updateprofile','UsersController@updateprofile');
    Route::get('editpassword','UsersController@editpassword');
    Route::post('storestaffaddresses','UsersController@storestaffaddresses');
    Route::get('createstaffaddresses','UsersController@createstaffaddresses')->name('user.createstaffaddresses');
    
    Route::post('storeleavebalance','UsersController@storeleavebalance');
    Route::get('createleavebalance','UsersController@createleavebalance')->name('user.createleavebalance');
    
    Route::get('staffaddresses','UsersController@staffaddresses')->name('user.staffaddresses');
    Route::get('staffleavebalance','UsersController@staffleavebalance')->name('user.staffleavebalance');
    Route::get('editleavebalance/{EmployeeID}','UsersController@editleavebalance')->name('user.editleavebalance');
    Route::post('updateleavebalance','UsersController@updateleavebalance')->name('user.updateleavebalance');
    Route::get('editstaffaddresses/{EmployeeID}','UsersController@editstaffaddresses')->name('user.editstaffaddresses');
    Route::post('updatestaffaddresses','UsersController@updatestaffaddresses')->name('user.updatestaffaddresses');
    
    Route::get('editprofile','UsersController@editprofile');
    Route::resource('departments', 'DepartmentController');
    Route::resource('leaverequests', 'LeaverequestController');
    Route::get('departmentalleavehistory','LeaverequestController@departmentalleavehistory');
    Route::get('employeeleavehistory','LeaverequestController@employeeleavehistory');
    
    
});
