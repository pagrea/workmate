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

//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['disablepreventback','auth']],function(){
    Route::get('/home', 'HomeController@index')->name('home'); 
    Route::resource('user','UsersController');
    Route::get('editprofile','UsersController@editprofile');
    Route::get('updateprofile','UsersController@updateprofile');
    Route::get('editpassword','UsersController@editpassword');
    Route::post('storestaffaddresses','UsersController@storestaffaddresses');
    Route::get('createstaffaddresses','UsersController@createstaffaddresses')->name('user.createstaffaddresses');
    Route::get('createleavebalance','UsersController@createleavebalance')->name('user.createleavebalance');
    Route::get('staffleavebalance','UsersController@staffleavebalance')->name('user.staffleavebalance');
    Route::get('editleavebalance/{id}','UsersController@editleavebalance')->name('user.editleavebalance');
    Route::post('updateleavebalance','UsersController@updateleavebalance')->name('user.updateleavebalance');
    Route::get('editprofile','UsersController@editprofile');
    Route::get('Exportstaffdata','UsersController@Exportstaffdata');

    Route::get('createdependant/{id}','UsersController@createdependant');
    Route::get('editdependant/{id}','UsersController@editdependant');
    Route::post('storedependant','UsersController@storedependant');
    Route::post('updatedependant','UsersController@updatedependant');
    Route::get('userexportpdf/{id}','UsersController@userexportpdf');

    Route::get('editbulkleavebalance','UsersController@editbulkleavebalance')->name('user.editbulkleavebalance');
    Route::get('updatebulkleavebalance','UsersController@updatebulkleavebalance')->name('user.updatebulkleavebalance');
    Route::resource('departments', 'DepartmentController');
    Route::resource('leaverequests', 'LeaverequestController');
    Route::get('substituteleaveapproval','LeaverequestController@substituteleaveapproval')->name('leaverequests.substituteleaveapproval');
    Route::get('hodleaveapproval','LeaverequestController@hodleaveapproval')->name('leaverequests.hodleaveapproval');
    Route::get('hrleaveapproval','LeaverequestController@hrleaveapproval')->name('leaverequests.hrleaveapproval');
    Route::get('personalleavehistoryexport','LeaverequestController@personalleavehistoryexport');
    Route::get('Exportdepartmentalleavehistory','LeaverequestController@Exportdepartmentalleavehistory');
    Route::get('ExportAllstaffsleavehistory','LeaverequestController@ExportAllstaffsleavehistory');
    Route::get('departmentalleavehistory','LeaverequestController@departmentalleavehistory');
    Route::get('employeeleavehistory','LeaverequestController@employeeleavehistory');
    Route::get('substituteAccept/{id}','LeaverequestController@substituteAccept');
    Route::get('substituteDecline/{id}','LeaverequestController@substituteDecline');
    Route::get('hrAccept','LeaverequestController@hrAccept');
    Route::post('hrDecline/{id}','LeaverequestController@hrDecline');
    Route::get('hodAccept/{id}','LeaverequestController@hodAccept');
    Route::post('hodDecline/{id}','LeaverequestController@hodDecline');
    Route::get('hodDeclinefrm/{id}','LeaverequestController@hodDeclinefrm');
    Route::get('hrDeclinefrm/{id}','LeaverequestController@hrDeclinefrm');
    Route::resource('roles', 'RolesController');
    Route::get('exportpdf/{id}','LeaverequestController@exportpdf');
    Route::get('sendemail','LeaverequestController@sendemail');

    
});
