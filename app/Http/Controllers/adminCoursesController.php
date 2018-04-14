<?php

namespace App\Http\Controllers;

use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Services\categoryService;
use OpenMooc\Courses\Services\coursesService;
use Validator;
use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesCategories;
use OpenMooc\Courses\Services\coursesRateService;

class adminCoursesController extends Controller
{
    // show all course
    public function index()
    {
        $coursesService = new coursesService();
        $courses = $coursesService->getCourses();
        return view('dashboard.admin.courses')
            ->with('courses',$courses);
    }

    // show add course form
    public function create()
    {
        $categories = CoursesCategories::all();
        return view('dashboard.admin.addcourse')
            ->with('categories',$categories);
    }

    // add new course to database
    public function store(Request $request)
    {
        $coursesService = new coursesService();
        if($coursesService->addCourse($request))
            return back();

        return $coursesService->errors();
    }

    // show course by id
    public function show($id)
    {
        //
    }

    // show update form
    public function edit($id)
    {
        $catService = new categoryService();
        $categories = $catService->getCategories();
        $cService = new coursesService();
        $course = $cService->getCourse($id);
        return view('dashboard.admin.updatecourse')->with('course',$course)
            ->with('categories',$categories);
    }

    // update course in database
    public function update(Request $request)
    {
        $cService = new coursesService();
        if($cService->updateCourse($request)){
            return back();;
        }else{
            return $cService->errors();
        }
    }

    // delete course from database
    public function destroy($id)
    {
        $cService = new coursesService();
        if($cService->deleteCourse($id)){
            return back();;
        }else{
            return $cService->errors();
        }
    }


    public function getCoursesByCategory($id)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByCategory($id);
        return view('dashboard.admin.coursesbycat')->with('courses',$courses);
    }

    public function getCoursesByInstructor($id)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByInstructor($id);
        return view('dashboard.admin.coursesbyins')->with('courses',$courses);
    }


    public function getCoursesByStudentId($id)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByStudentId($id);
        return view('dashboard.admin.coursesbystudent')->with('courses',$courses);
    }


    public function getCoursesByActiveStatus($status)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByActiveStatus($status);
        return view('dashboard.admin.coursesbystatus')->with('courses',$courses);
    }


    public function updateCourseActiveStatus($id,$status)
    {
        $cService = new coursesService();
        if($cService->updateCourseActiveStatus($id,$status)){
            return back();
        }else{
            return $cService->errors();
        }
    }


    public function searchCourses()
    {
        $keyword = $_GET['search'];
        $cService = new coursesService();
        $courses = $cService->searchCourses($keyword);
        return view('dashboard.admin.coursesearch')->with('courses',$courses);
    }


    // get rates
    public function getRates()
    {
        $rService = new coursesRateService();
        $rates = $rService->getRates();
        return view('dashboard.admin.rates')->with('rates',$rates);
    }

    public function deleteRate($id)
    {
        $rService = new coursesRateService();
        if($rService->deleteRate($id)){
            return back();
        }else{
            return $rService->errors();
        }
    }

}