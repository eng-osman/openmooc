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

// information
Route::get('student/courses/information','studentController@information');

//subscription
Route::get('student/courses/subs','studentController@approveSubscribe');

Route::get('student/courses/subs/{id}/delete','studentController@deleteSubscription');

Route::get('student/courses/unsubs','studentController@getUnSubsStudent');

Route::get('student/courses/subs/add','studentController@addSubscription');

Route::post('student/courses/subs/add','studentController@addSubscribeToDB');

//rate
Route::get('student/courses/rates','studentController@getRates');

Route::get('student/courses/rates/{id?}/add','studentController@addRate');

Route::post('student/courses/rates/{id?}/add','studentController@addRateToDB');

Route::get('student/courses/rates/{id?}/delete','studentController@deleteRate');








Route::get('api/courses','coursesAPIController@courses');
Route::get('add','coursesController@addCourse');
Route::post('add','coursesController@processAddCourse');
Route::get('courses','coursesController@courses');








