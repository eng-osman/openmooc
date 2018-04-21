<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
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


Route::get('api/courses', 'coursesAPIController@courses');
Route::get('add', 'coursesController@addCourse');
Route::post('add', 'coursesController@processAddCourse');
Route::get('courses', 'coursesController@courses');
// Start instructor permissions
Route::get('instructor/{id}', 'InstructorController@index');
Route::get('instructor/{id}/courses', 'InstructorController@myCourses');
Route::get('students/{id}', 'InstructorController@showStudentsInCourse');
Route::get('subscription/approve/{id}', 'InstructorController@approveSubscription');
Route::get('subscription/unapprove/{id}', 'InstructorController@unApproveSubscription');
Route::get('subscription/delete/{id}', 'InstructorController@deleteSubscription');
Route::get('instructor/{id}/students', 'InstructorController@myStudents');

/*Route::get('add','coursesController@addCourse');
Route::post('add','coursesController@processAddCourse');*/
Route::get('courses', 'coursesController@courses');
Route::get('coursescategories', 'coursesController@getCategories');
Route::get('coursescategories/{status?}', 'coursesController@getCategoriesByStatus');
Route::get('coursescategoriesById/{id?}', 'coursesController@getCategoriesByCreatorId');
Route::get('user', 'coursesController@viewallCatrgories');
/** Users routs */
Route::get('users', 'usersController@addUser');
Route::post('users', 'usersController@processAddUser');
Route::get('deleteuser/{id?}', 'usersController@deleteUser');
Route::get('getusers', 'usersController@getUsers');
Route::get('getuser/{id?}', 'usersController@getUser');
Route::get('getuserByGroup/{group_id?}', 'usersController@getUsersByGroup');
Route::get('getuserByStatus/{status?}', 'usersController@getUsersByActiveStatus');
Route::get('searchuser/{keyword?}', 'usersController@searchUsers');
Route::get('updateUser/{id?}', 'usersController@updateUser');
Route::post('updateuser', 'usersController@processupdateuser');
Route::get('updateUserPassword/{id?}', 'usersController@updateUserPassword');
Route::post('updateUserPassword', 'usersController@processupdateUserPassword');
/***********************************************************/
/** courses lessons routs */
Route::get('lesson/{course_id?}', 'InstructorLessonController@getLessonsByCourseId');
Route::get('addLesson/{course_id?}', 'InstructorLessonController@addLesson');
Route::post('addlesson', 'InstructorLessonController@processaddLesson');
Route::get('updateLesson/{lesson_id}', 'InstructorLessonController@updateLesson');
Route::post('updatelesson', 'InstructorLessonController@processupdateLesson');
Route::get('DeleteLesson/{id?}', 'InstructorLessonController@deleteLesson');
/***********************************************************/
/** userGroup routs */
Route::get('addusergroup', 'usersGroupController@addUserGroup');
Route::post('addusergroup', 'usersGroupController@processAddUserGroup');
Route::get('updateusergroup/{id?}', 'usersGroupController@updateUserGroup');
Route::post('updateusergroup', 'usersGroupController@processupdateUserGroup');
Route::get('deleteusergroup/{id?}', 'usersGroupController@deleteUserGroup');
Route::get('getAllGroups', 'usersGroupController@getAllGroups');
Route::get('getGroupById/{id?}', 'usersGroupController@getGroupById');
/***********************************************************/
/** Courses CATEGORY routs */
Route::get('addCategory', 'courseCategoryController@addCategory');
Route::post('addcategory', 'courseCategoryController@processAddCategory');
Route::get('updateCategory/{id?}', 'courseCategoryController@updateCategory');
Route::post('updateCategory', 'courseCategoryController@processupdateCategory');
Route::get('deleteCategory/{id?}', 'courseCategoryController@deleteCategory');
Route::get('getCategories', 'courseCategoryController@getCategories');
Route::get('getCategory/{id?}', 'courseCategoryController@getCategory');
Route::get('getCategoriesByStatus/{status?}', 'courseCategoryController@getCategoriesByStatus');
Route::get('getCategoriesByCreatorId/{creator_id?}', 'courseCategoryController@getCategoriesByCreatorId');
//finished by alaa ebrahim at 7/4/2018
/***********************************************************/
/** Courses courses routs */

/*Route::get('addCourse', 'courseController@addCourse');
Route::post('addcourse', 'courseController@processAddCourse');
Route::get('updateCategory/{id?}', 'courseCategoryController@updateCategory');
Route::post('updateCategory', 'courseCategoryController@processupdateCategory');
Route::get('deleteCourse/{id?}', 'courseController@deleteCourse');
Route::get('getCourses', 'courseController@getCourses');
Route::get('getCourses/{id?}', 'courseController@getCoursesByInstructor');
Route::get('getCoursesByCategory/{id?}', 'courseController@getCoursesByCategory');
Route::get('getCoursesByStudentId/{id?}', 'courseController@getCoursesByStudentId');
Route::get('getCoursesByActiveStatus/{id?}', 'courseController@getCoursesByActiveStatus');
Route::get('searchCourses/{id?}', 'courseController@searchCourses');
Route::get('getCourse/{id?}', 'courseController@getCourse');*/
/*******************************************/
Route::get('courses/create', 'courseController@addCourse');
Route::post('courses/create', 'courseController@processAddCourse');
Route::get('updateCategory/{id?}', 'courseCategoryController@updateCategory');
Route::post('updateCategory', 'courseCategoryController@processupdateCategory');
Route::get('deleteCourse/{id?}', 'courseController@deleteCourse');
Route::get('getCourses', 'courseController@getCourses');
Route::get('getCourses/{id?}', 'courseController@getCoursesByInstructor');
Route::get('getCoursesByCategory/{id?}', 'courseController@getCoursesByCategory');
Route::get('getCoursesByStudentId/{id?}', 'courseController@getCoursesByStudentId');
Route::get('getCoursesByActiveStatus/{id?}', 'courseController@getCoursesByActiveStatus');
Route::get('searchCourses/{id?}', 'courseController@searchCourses');
Route::get('getCourse/{id?}', 'courseController@getCourse');

//finished by alaa ebrahim at 7/4/2018
/***********************************************************/
// Course Students Routes by hamad adel
Route::get('subscription/add', 'coursesStudentsController@addStudentSubscription');
Route::post('subscription/add', 'coursesStudentsController@insertSubscription');
Route::get('subscription/all', 'coursesStudentsController@getAllSubscription');
Route::get('student/{id}', 'coursesStudentsController@getStudentSubscription');
/*******************************************************************/
Route::get('courses/create', 'courseController@addCourse');
Route::post('courses/create', 'courseController@processAddCourse');
Route::get('updateCategory/{id?}', 'courseCategoryController@updateCategory');
Route::post('updateCategory', 'courseCategoryController@processupdateCategory');
Route::get('deleteCourse/{id?}', 'courseController@deleteCourse');
Route::get('getCourses', 'courseController@getCourses');
Route::get('getCourses/{id?}', 'courseController@getCoursesByInstructor');
Route::get('getCoursesByCategory/{id?}', 'courseController@getCoursesByCategory');
Route::get('getCoursesByStudentId/{id?}', 'courseController@getCoursesByStudentId');
Route::get('getCoursesByActiveStatus/{id?}', 'courseController@getCoursesByActiveStatus');
Route::get('searchCourses/{id?}', 'courseController@searchCourses');
Route::get('getCourse/{id?}', 'courseController@getCourse');
/************************************************************************************/
//Course_lesson_comment Routes By alaa ebrahim at 13/4
Route::get('allcomments/{lesson_id?}', 'InstructorLessonController@getCommentsByLessonId');
Route::get('updateComment/{comment_id?}', 'InstructorLessonController@updateComment');
Route::post('updatecomment', 'InstructorLessonController@processupdateComment');
Route::get('DeleteComment/{comment_id?}', 'InstructorLessonController@deleteComment');
Route::get('addComment/{lesson_id?}', 'InstructorLessonController@addComment');
Route::post('addcomment/{lesson_id?}', 'InstructorLessonController@processAddCourseLessonComment');



//__________________________________________//
// Course Edit and Remove By M.sayed

Route::get('courses/edit/{id}', 'courseController@updateCourse');
Route::post('courses/edit/{id}', 'courseController@updateCourseProcess');
Route::get('courses/delete/{id}', 'courseController@deleteCourse');


//__________________________________________//
// Course Edit and Remove By M.sayed
Route::get('courses/edit/{id}', 'courseController@updateCourse');
Route::post('courses/edit/{id}', 'courseController@updateCourseProcess');
Route::get('courses/delete/{id}', 'courseController@deleteCourse');

