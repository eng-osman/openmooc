<?php
namespace App\Http\Controllers;

use OpenMooc\Courses\Models\Courses;
use Validator;
use OpenMooc\Courses\Services\coursesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenMooc\Users\Models\Users;

class courseController extends Controller
{
    private $coursesService;

    public function __construct()
    {
        $this->coursesService = new coursesService();
    }

    public function addCourse()
    {
        $instructor = Users::all()->whereIn('user_group',[1,3]);
        $categories = DB::table('courses_categories')->get();

        return view('course.addcourse')
            ->with('instructors', $instructor)
            ->with('categories', $categories);
    }

    public function processAddCourse(Request $request)
    {
        if ($this->coursesService->addCourse($request))
            return 'course Added';

        return $this->coursesService->errors();
    }


    // update courses

    public function updateCourse($id)
    {
        $instructor = Users::all()->whereIn('user_group',[1,3]);
        $categories = DB::table('courses_categories')->get();
        $service=  new coursesService();
        $course = $service->getCourse($id);
        return view('course.edit')->with('instructors', $instructor)
                                ->with('categories',$categories)
                                ->with('course', $course);

    }

    // update course process
    public function updateCourseProcess(Request $request, $id)
    {
        // validation the update form
        $validator = Validator::make($request->all(), [
            'name'       =>'required:min:3:max:50',
            'category'   =>'required',
            'instructor' =>'required',
            'description'=>'required',
            'status'     =>'required'
        ]);
        if($validator->fails())
            return redirect()->back()->withErrors($validator);

        $course = Courses::find($id);
        $course->course_name = $request->get('name');
        $course->course_category = $request->get('category');
        $course->course_instructor = $request->get('instructor');
        $course->course_description = $request->get('description');
        $course->is_active = $request->get('status');
        if($course->save())
            return  $course->course_name . ' course updated  successfully';

        //'return Error message'
        return 'error Updating course ';
    }



    public function deleteCourse($id = 0)
    {
        if ($this->coursesService->deleteCourse($id))
            return 'course deleted';
        return $this->coursesService->errors();
    }


    public function getCourses()
    {

        $courses = $this->coursesService->getCourses();

        return view('courses')
            ->with('coursesList', $courses);

    }


    public function getCoursesByInstructor($id)
    {  $courses = $this->coursesService->getCoursesByInstructor($id);
        if(count($courses)>0):
        return view('course.courses')
        ->with('coursesList', $courses);
        endif;
        return 'there is no course matched';
    }


    public function getCoursesByCategory($category_id=0)
    {$courses = $this->coursesService->getCoursesByCategory($category_id);
        if(count($courses)>0){
            return view('course')
                ->with('coursesList', $courses);}
        return 'there is no course matched';
    }


    public function getCoursesByStudentId($studentId)

        {$courses = $this->coursesService->getCoursesByStudentId($studentId);
            if(count($courses)>0){
                return view('course')
                    ->with('coursesList', $courses);}
            return 'there is no course matched';
    }


    public function getCoursesByActiveStatus($status=1)
    {
        $courses = $this->coursesService->getCoursesByActiveStatus($status);
        if(count($courses)>0){
            return view('course')
                ->with('coursesList', $courses);}
        return 'there is no course matched';

    }



    public function searchCourses($keywords)
    {
        $courses = $this->coursesService->searchCourses($keywords);

        if(count($courses)>0){
            return view('course')
                ->with('coursesList', $courses);}
        return 'there is no course matched';
    }
}