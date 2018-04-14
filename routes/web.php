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


Route::prefix('admin')->group(function () {
    // Home
    Route::get('/','adminController@index');
    // Users Groups
    Route::resource('groups','adminUsersGroupsController');
    // Users
    Route::resource('users','adminUsersController');
    // Categories
    Route::resource('categories','adminCategoriesController');
    // courses
    Route::resource('courses','adminCoursesController');
    Route::get('coursesactive/{id}','adminCoursesController@getCoursesByActiveStatus');
    // lessons
    Route::resource('lessons','adminLessonsController');

    // Update Password
    Route::get('updatePasswrd/{id}','adminUsersController@updateUserPassword');
    Route::post('updatePasswrd','adminUsersController@processupdateUserPassword');
    // Users By Active Status
    Route::get('getUsersByActive/{status}','adminUsersController@getUsersByActiveStatus');
    Route::get('active/{id}','adminUsersController@activeUser');
    Route::get('deactivate/{id}','adminUsersController@deActivateUser');
    Route::get('delete/{id}','adminUsersController@deleteUser');


    // users by group
    Route::get('usersgroup/{id}','adminUsersController@getUsersByGroup');

    // categories by status
    Route::get('categoriesstatus/{id}','adminCategoriesController@getCategoriesByStatus');
    // categories by creator
    Route::get('categoriescreator/{id}','adminCategoriesController@getCategoriesByCreatorId');

    // user search
    Route::get('usersearch','adminUsersController@searchUsers');
    // course search
    Route::get('coursesearch','adminCoursesController@searchCourses');
    // courses by status
    Route::get('coursesbystatus/{status}','adminCoursesController@getCoursesByActiveStatus');
    // update course status
    Route::get('coursesstatus/{id}/{status}','adminCoursesController@updateCourseActiveStatus');
    // update category status
    Route::get('catbystatus/{id}/{status}','adminCategoriesController@updateCategoryStatus');
    // show subscribe
    Route::get('subscribe','adminStudentsController@approveSub');
    // delete subscribe
    Route::get('subscribe/{id}','adminStudentsController@deleteSubscription');
    // show subscribe (Not approve)
    Route::get('unapproved','adminStudentsController@getunapprovestudent');
    // approve subscribe
    Route::get('approved/{id}/{status}','adminStudentsController@approveSubscription');

    // show comments
    Route::get('comments','adminLessonsController@getComments');
    // delete comments
    Route::get('deletecomment/{id}','adminLessonsController@deleteComment');

    // show rates
    Route::get('rates','adminCoursesController@getRates');
    // delete rate
    Route::get('deleterate/{id}','adminCoursesController@deleteRate');


});