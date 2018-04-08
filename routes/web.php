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
Route::get('api/courses','coursesAPIController@courses');
/*Route::get('add','coursesController@addCourse');
Route::post('add','coursesController@processAddCourse');*/
Route::get('courses','coursesController@courses');
Route::get('coursescategories','coursesController@getCategories');
Route::get('coursescategories/{status?}','coursesController@getCategoriesByStatus');
Route::get('coursescategoriesById/{id?}','coursesController@getCategoriesByCreatorId');

Route::get('user','coursesController@viewallCatrgories');

/** Users routs */
Route::get('users','usersController@addUser');
Route::post('users','usersController@processAddUser');
Route::get('deleteuser/{id?}','usersController@deleteUser');
Route::get('getusers','usersController@getUsers');
Route::get('getuser/{id?}','usersController@getUser');
Route::get('getuserByGroup/{group_id?}','usersController@getUsersByGroup');
Route::get('getuserByStatus/{status?}','usersController@getUsersByActiveStatus');
Route::get('searchuser/{keyword?}','usersController@searchUsers');
Route::get('updateUser/{id?}','usersController@updateUser');
Route::post('updateuser','usersController@processupdateuser');
Route::get('updateUserPassword/{id?}','usersController@updateUserPassword');
Route::post('updateUserPassword','usersController@processupdateUserPassword');
/***********************************************************/
/** courses lessons routs */
Route::get('addlesson','coursesLessonController@addLesson');
Route::post('addlesson','coursesLessonController@processaddLesson');
Route::get('updateLesson/{id?}','coursesLessonController@updateLesson');
Route::post('updateLesson','coursesLessonController@processupdateLesson');
Route::get('deleteLesson/{id?}','coursesLessonController@deleteLesson');
Route::get('getLessonsByCourseId/{id?}','coursesLessonController@getLessonsByCourseId');
Route::get('getLessonsByInstructorId/{id?}','coursesLessonController@getLessonsByInstructorId');

/** userGroup routs */
Route::get('addusergroup','usersGroupController@addUserGroup');
Route::post('addusergroup','usersGroupController@processAddUserGroup');
Route::get('updateusergroup/{id?}','usersGroupController@updateUserGroup');
Route::post('updateusergroup','usersGroupController@processupdateUserGroup');
Route::get('deleteusergroup/{id?}','usersGroupController@deleteUserGroup');
Route::get('getAllGroups','usersGroupController@getAllGroups');
Route::get('getGroupById/{id?}','usersGroupController@getGroupById');



/** Courses CATEGORY routs */

Route::get('addCategory','courseCategoryController@addCategory');
Route::post('addcategory','courseCategoryController@processAddCategory');
Route::get('updateCategory/{id?}','courseCategoryController@updateCategory');
Route::post('updateCategory','courseCategoryController@processupdateCategory');
Route::get('deleteCategory/{id?}','courseCategoryController@deleteCategory');
Route::get('getCategories','courseCategoryController@getCategories');
Route::get('getCategory/{id?}','courseCategoryController@getCategory');
Route::get('getCategoriesByStatus/{status?}','courseCategoryController@getCategoriesByStatus');
Route::get('getCategoriesByCreatorId/{creator_id?}','courseCategoryController@getCategoriesByCreatorId');

//finished by alaa ebrahim at 7/4/2018
/***********************************************************/
/** Courses courses routs */

Route::get('addCourse','courseController@addCourse');
Route::post('addcourse','courseController@processAddCourse');
Route::get('updateCategory/{id?}','courseCategoryController@updateCategory');
Route::post('updateCategory','courseCategoryController@processupdateCategory');
Route::get('deleteCourse/{id?}','courseController@deleteCourse');
Route::get('getCourses','courseController@getCourses');
Route::get('getCourses/{id?}','courseController@getCoursesByInstructor');
Route::get('getCoursesByCategory/{id?}','courseController@getCoursesByCategory');
Route::get('getCoursesByStudentId/{id?}','courseController@getCoursesByStudentId');
Route::get('getCoursesByActiveStatus/{id?}','courseController@getCoursesByActiveStatus');
Route::get('searchCourses/{id?}','courseController@searchCourses');
Route::get('getCourse/{id?}','courseController@getCourse');



//finished by alaa ebrahim at 7/4/2018
/***********************************************************/

// Course Students Routes by hamad adel
Route::get('subscription/add', 'coursesStudentsController@addStudentSubscription');
Route::post('subscription/add', 'coursesStudentsController@insertSubscription');
Route::get('subscription/all', 'coursesStudentsController@getAllSubscription');
Route::get('subscription/approve/{id}', 'coursesStudentsController@approveSubscription');
Route::get('subscription/unapprove/{id}', 'coursesStudentsController@unApproveSubscription');
Route::get('subscription/delete/{id}', 'coursesStudentsController@deleteSubscription');
Route::get('student/{id}', 'coursesStudentsController@getStudentSubscription');
