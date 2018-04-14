<?php
namespace App\Http\Controllers;

use OpenMooc\Courses\Services\coursesCategoriesService;
use OpenMooc\Courses\Services\coursesLessonService;
use OpenMooc\Users\Services\usersService;
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
        $usersService = new usersService();
        $categoryService = new coursesCategoriesService();
        $instructor = $usersService->getUsersByGroup([1, 3]);
        $categories = $categoryService->getCategories();
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

        // get categories data
        $categories = DB::table('courses_categories')->get();
        // get course data
        $course = $this->coursesService->getCourse($id);
        // return to view
        return view('dashboard.instructor.editcoursebyinst')
            ->with('categories', $categories)
            ->with('course', $course);

    }

    // update course process
    public function updateCourseProcess(Request $request)
    {
        if ($this->coursesService->updateCourseProcess($request)) {


            $message = "Courses Successfully Edit ";
            return view('dashboard.instructor.success')
                ->with('message', $message);
        } else {
            $error = $this->coursesService->errors();

            return redirect()
                ->back()
                ->withErrors($error);

        }
    }


    // delelet coures By id
    public function deleteCourse($id)
    {
        //chk data
        $data = $this->coursesService->getCourse($id);


        // if data true call del method
        if ($data) {
            $del = $this->coursesService->deleteCourse($id);
            // if del Course
            if ($del) {
                $message = 'Courses Successfully Deleted ';
                return view('dashboard.instructor.success')
                    ->with('message', $message);
            }
            //if not found data
            return view('dashboard.instructor.oopsmessage');
        }


    }


    public function getCourses()
    {

        $courses = $this->coursesService->getCourses();

        return view('courses')
            ->with('coursesList', $courses);

    }


    public function getCoursesByInstructor($id)
    {
        $courses = $this->coursesService->getCoursesByInstructor($id);
        if (count($courses) > 0)
            return $courses;
        return 'no course for this instructor';
    }


    public function getCoursesByCategory($category_id = 0)
    {
        $courses = $this->coursesService->getCoursesByCategory($category_id);
        if (count($courses) > 0) {
            return view('course')
                ->with('coursesList', $courses);
        }
        return 'there is no course matched';
    }


    public function getCoursesByStudentId($studentId)

    {
        $courses = $this->coursesService->getCoursesByStudentId($studentId);
        if (count($courses) > 0) {
            return view('course')
                ->with('coursesList', $courses);
        }
        return 'there is no course matched';
    }


    public function getCoursesByActiveStatus($status = 1)
    {
        $courses = $this->coursesService->getCoursesByActiveStatus($status);
        if (count($courses) > 0) {
            return view('course')
                ->with('coursesList', $courses);
        }
        return 'there is no course matched';

    }


    public function searchCourses($keywords)
    {
        $courses = $this->coursesService->searchCourses($keywords);

        if (count($courses) > 0) {
            return view('course')
                ->with('coursesList', $courses);
        }
        return 'there is no course matched';
    }


}

