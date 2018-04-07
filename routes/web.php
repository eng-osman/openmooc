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

// Users Groups
Route::get('addgroup','usersGroupsController@addUserGroup');
Route::post('addgroup','usersGroupsController@processaddUserGroup');
Route::get('groups','usersGroupsController@getAllGroups');
//Route::get('group/{id}','usersGroupsController@getGroupById');
Route::get('updategroup/{id}','usersGroupsController@updateUserGroup');
Route::post('updategroup','usersGroupsController@processupdateUserGroup');
Route::get('deletegroup/{id}','usersGroupsController@deleteUserGroup');

// Users
Route::get('adduser','usersController@addUser');
Route::post('adduser','usersController@processaddUser');
Route::get('users','usersController@getUsers');
Route::get('updateuser/{id}','usersController@getUser');
Route::post('updateuser','usersController@updateUser');
Route::get('updatepassword/{id}','usersController@updateUserPassword');
Route::post('updatepassword','usersController@processupdateUserPassword');
Route::get('deleteuser/{id}','usersController@deleteUser');
Route::get('usersByGroup/{id}','usersController@getUsersByGroup');
Route::get('usersByStatus/{id}','usersController@getUsersByActiveStatus');
Route::get('search/{keyword}','usersController@searchUsers');

// Categories
Route::get('addcategory','categoriesController@addCategory');
Route::post('addcategory','categoriesController@processaddCategory');
Route::get('categories','categoriesController@getCategories');
Route::get('updatecategory/{id}','categoriesController@getCategory');
Route::post('updatecategory','categoriesController@updateCategory');
Route::get('deletecategory/{id}','categoriesController@deleteCategory');
Route::get('categoriesByStatus/{id}','categoriesController@getCategoriesByStatus');
Route::get('categoriesByCreator/{id}','categoriesController@getCategoriesByCreatorId');

// courses
Route::get('addcourse','coursesController@addCourse');
Route::post('addcourse','coursesController@processAddCourse');
Route::get('courses','coursesController@courses');
Route::get('updatecourse/{id}','coursesController@getCourse');
Route::post('updatecourse','coursesController@updateCourse');
Route::get('deletecourse/{id}','coursesController@deleteCourse');
Route::get('updatecoursestatus/{id}','coursesController@courseStatus');
Route::post('updatecoursestatus','coursesController@updateCourseActiveStatus');
Route::get('coursesByCat/{id}','coursesController@getCoursesByCategory');
Route::get('coursesByIns/{id}','coursesController@getCoursesByInstructor');
Route::get('coursesByStudent/{id}','coursesController@getCoursesByStudentId');
Route::get('coursesByStatus/{id}','coursesController@getCoursesByActiveStatus');

Route::get('csearch/{keyword}','coursesController@searchCourses');

// lessons
Route::get('addlesson','lessonsController@addLesson');
Route::post('addlesson','lessonsController@processaddLesson');
Route::get('updatelesson/{id}','lessonsController@getlesson');
Route::post('updatelesson','lessonsController@updateLesson');
Route::get('deletelesson/{id}','lessonsController@deleteLesson');
Route::get('lessons/{id}','lessonsController@getLessonsByCourseId');
Route::get('lessonsIns/{id}','lessonsController@getLessonsByInstructorId');

// Comments
Route::get('addcomment','commentsController@addComment');
Route::post('addcomment','commentsController@processaddComment');
Route::get('updatecomment/{id}','commentsController@getcomment');
Route::post('updatecomment','commentsController@updateComment');
Route::get('deletecomment/{id}','commentsController@deleteComment');
Route::get('comments/{id}','commentsController@getCommentsByLessonId');
Route::get('commentsByUser/{id}','commentsController@getCommentsByUserId');

// Rate
Route::get('addrate','coursesRateController@addRate');
Route::post('addrate','coursesRateController@processaddRate');
Route::get('rate/{id}','coursesRateController@getRateByCourseId');
Route::get('avgrate/{id}','coursesRateController@getAVGRateByCourseId');
Route::get('updaterate/{id}','coursesRateController@getrate');
Route::post('updaterate','coursesRateController@updateRate');
Route::get('deleterate/{id}','coursesRateController@deleteRate');

// Student
Route::get('addstudent','coursesStudentsController@addStudent');
Route::post('addstudent','coursesStudentsController@addStudentToCourse');
Route::get('approvestudent','coursesStudentsController@approveSub');
Route::post('approvestudent','coursesStudentsController@approveSubscription');
Route::get('deletestudent/{id}','coursesStudentsController@deleteSubscription');
Route::get('check/{sid}/{cid}','coursesStudentsController@checkSubscription');
