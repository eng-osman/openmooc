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
    return view('dashboard.admin.index');
});



Route::get('admin/courses','adminCoursesController@index');
Route::get('admin/courses/add','adminCoursesController@add');
Route::post('admin/courses/add','adminCoursesController@processAdd');
Route::get('admin','adminController@index');
Route::get('instructor','adminController@index');
Route::get('student','adminController@index');

Route::get('api/courses','coursesAPIController@courses');
Route::get('add','coursesController@addCourse');
Route::post('add','coursesController@processAddCourse');
Route::get('courses','coursesController@courses');
Route::get('CoursesStudents/All','coursesStudentsController@getAll');
Route::get('test/delete','coursesStudentsController@delCourseStudentById');
Route::get('test/add','coursesStudentsController@addCourseStudent');
Route::get('/addRate','coursesRateController@addCourseRat');
Route::get('/updateRate','coursesRateController@updateCourseRat');
Route::get('/deleteRate','coursesRateController@deleteCourseRat');
Route::get('/getCourseById','coursesRateController@getRateByCourseId');
Route::get('/getAverage','coursesRateController@getAVGRateByCourseId');
