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
    // lessons
    Route::resource('lessons','adminLessonsController');

});