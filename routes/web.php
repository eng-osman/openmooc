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
    Route::get('/','adminController@index')->name('home');
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
    //Search
    Route::get('search/{keyword}','adminUsersController@searchUsers');

});