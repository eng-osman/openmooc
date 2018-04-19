    <?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('courses','coursesAPIController@index');
Route::get('courses/{id}','coursesAPIController@show');
Route::post('courses/add','coursesAPIController@store');
Route::post('courses/update/{id}','coursesAPIController@update');
Route::get('courses/delete/{id}','coursesAPIController@destroy');
Route::get('coursesbycategory/{id}','coursesAPIController@getCoursesByCategory');
Route::get('coursesbyinstructor/{id}','coursesAPIController@getCoursesByInstructor');
Route::get('statuscourses/{status}','coursesAPIController@getCoursesByActiveStatus');
Route::get('updateactive/{id}/{status}','coursesAPIController@updateCourseActiveStatus');