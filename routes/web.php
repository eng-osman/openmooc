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








//student

//catgrgoris
Route::get('student/categories','studentController@allCategories');
Route::get('student/categories/{id}/courses','studentController@getCoursesByCategoryId');


//courses
Route::get('student','studentController@index');

Route::get('student/course/{id}','studentController@CourseDetails');

// lessons and comments
Route::get('student/course/lessons/{id}','studentController@lessonAndComments');

Route::post('student/course/lessons/{id}','studentController@addCommentOnLesson');

Route::get('student/course/lessons/delete/{id}','studentController@deleteCommentFromLesson');

Route::get('student/course/lessons/update/{id}','studentController@updateComment');

Route::post('student/course/lessons/update/{id}','studentController@updateCommentToDB');

//subscription
Route::get('student/course/{id}/subscribe','studentController@addSubscription');

Route::post('student/course/{id}/subscribe','studentController@addSubscribeToDB');

//rate
Route::get('student/course/{id}/rate','studentController@addRate');

Route::post('student/course/{id}/rate','studentController@addRateToDB');





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








