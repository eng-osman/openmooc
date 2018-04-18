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

Route::get('/', function (){
    return view('welcome');
});
Route::get('admin/courses','adminCoursesController@index');
Route::get('admin/courses/add','adminCoursesController@add');
Route::post('admin/courses/add','adminCoursesController@processAdd');
Route::get('admin','adminController@index');
Route::get('instructor','adminController@index');

//subs
Route::get('student','studentController@index');
Route::get('student/course/{id}','studentController@CourseDetails');
Route::get('student/course/lessons/{id}','studentController@lessonAndComments');
Route::post('student/course/lessons/{id}','studentController@addCommentOnLesson');
Route::get('student/course/lessons/delete/{id}','studentController@deleteCommentFromLesson');










Route::get('student/addSubscription','studentController@addSubscription');
Route::post('student/addSubscription','studentController@addSubscribeToDB');
Route::get('student/{id?}/updateSubscription','studentController@approveSubscription');
Route::post('student/updateSubscription','studentController@approveSubscriptionToDB');
Route::get('student/mySubsCourses','studentController@mySubsCourses');

//rate
Route::get('student/coursesRate','studentRateController@index');
Route::get('student/{id?}/addRate','studentRateController@addRate');
Route::post('student /addRate','studentRateController@addRateToDB');



Route::get('api/courses','coursesAPIController@courses');
Route::get('add','coursesController@addCourse');
Route::post('add','coursesController@processAddCourse');
Route::get('courses','coursesController@courses');








