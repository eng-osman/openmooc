<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*****userControllerAPI Rotes*******/
Route::get('addUser','UserControllerAPI@addUser');
Route::post('addUser','UserControllerAPI@processAddUser');
Route::get('getUsers','UserControllerAPI@getUsers');
Route::post('deleteUser','UserControllerAPI@deleteUser');
Route::post('getUser','UserControllerAPI@getUser');
Route::post('getUsersByGroup','UserControllerAPI@getUsersByGroup');
Route::post('getUsersByActiveStatus','UserControllerAPI@getUsersByActiveStatus');
Route::post('searchUsers','UserControllerAPI@searchUsers');
Route::post('updateUser','UserControllerAPI@updateUser');
Route::post('processupdateuser','UserControllerAPI@processupdateuser');
Route::post('updateUserPassword','UserControllerAPI@updateUserPassword');
Route::post('processupdateUserPassword','UserControllerAPI@processupdateUserPassword');
/***********************end userControllerAPI routes*********/





Route::get('course/all', 'coursesAPIController@index');
Route::get('course/view/{id}', 'coursesAPIController@view');
Route::post('course/add', 'coursesApiController@add');

// user group Api Routes
Route::get('userGroup/all', 'UserGroupApiController@index');
Route::get('userGroup/view/{id}', 'UserGroupApiController@view');
Route::post('userGroup/add', 'UserGroupApiController@add');
Route::post('userGroup/edit/{id}', 'UserGroupApiController@update');
Route::get('userGroup/delete/{id}','UserGroupApiController@delete');



//  courses lesson API Controller
Route::get('addlesson', 'coursesLessonAPIController@addLesson');
Route::post('addlesson', 'coursesLessonAPIController@processaddLesson');
Route::get('updatelesson/{lessonid}', 'coursesLessonAPIController@updateLesson');
Route::post('updatelesson/{lessonid}', 'coursesLessonAPIController@processupdateLesson');
Route::get('viewlessonbyinstructor/{id}', 'coursesLessonAPIController@viewLessonByInstructorId');
Route::get('viewlessonbycourse/{id}', 'coursesLessonAPIController@viewLessonsByCourseId');
Route::get('deletelesson/{id}', 'coursesLessonAPIController@deleteLesson');