<?php

namespace App\Http\Controllers;

use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Services\categoryService;
use OpenMooc\Courses\Services\coursesService;
use Validator;
use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesCategories;

class coursesController extends Controller
{
    public function addCourse()
    {
        $categories = CoursesCategories::all();
        return view('course')
            ->with('categories',$categories);
    }

    public function processAddCourse(Request $request)
    {
        $coursesService = new coursesService();
        if($coursesService->addCourse($request))
            return 'Course Added';

        return $coursesService->errors();
    }

    public function courses()
    {
        $coursesService = new coursesService();
        $courses = $coursesService->getCourses();
        return view('courses')
            ->with('coursesList',$courses);
    }

    public function getCoursesByCategory($id)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByCategory($id);
        return view('coursesByCat')->with('courses',$courses);
    }

    public function getCoursesByInstructor($id)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByInstructor($id);
        return view('coursesByIns')->with('courses',$courses);
    }


    public function getCoursesByStudentId($id)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByStudentId($id);
        return view('coursesByStudent')->with('courses',$courses);
    }


    public function getCoursesByActiveStatus($status)
    {
        $cService = new coursesService();
        $courses = $cService->getCoursesByActiveStatus($status);
        return view('coursesByStatus')->with('courses',$courses);
    }


    public function getCourse($id)
    {
        $catService = new categoryService();
        $categories = $catService->getCategories();
        $cService = new coursesService();
        $course = $cService->getCourse($id);
        return view('updatecourse')->with('course',$course)
                                   ->with('categories',$categories);
    }


    public function updateCourse(Request $request)
    {
        $cService = new coursesService();
        if($cService->updateCourse($request)){
            return 'Course Updated';
        }else{
            return $cService->errors();
        }
    }

    public function courseStatus($id)
    {
        $cService = new coursesService();
        $course = $cService->getCourse($id);
        return view('updatecoursestatus')->with('course',$course);
    }



    public function updateCourseActiveStatus(Request $request)
    {
        $cService = new coursesService();
        if($cService->updateCourseActiveStatus($request)){
            return 'Updated';
        }else{
            return $cService->errors();
        }
    }


    public function deleteCourse($id)
    {
        $cService = new coursesService();
        if($cService->deleteCourse($id)){
            return 'Course deleted';
        }else{
            return $cService->errors();
        }
    }


    public function searchCourses($keyword)
    {
        $cService = new coursesService();
        $courses = $cService->searchCourses($keyword);
        return view('csearch')->with('courses',$courses);
    }
}