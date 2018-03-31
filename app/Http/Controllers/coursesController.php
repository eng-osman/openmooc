<?php

namespace App\Http\Controllers;

use OpenMooc\Courses\Models\Courses;
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
            ->with('map','<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13807.714205682118!2d31.364934146404266!3d30.096232526655985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458161427e28abb%3A0x6258e0ca55113e35!2sArab+Academy+For+Science%2C+Technology+%26+Maritime+Transport+Building+A!5e0!3m2!1sen!2seg!4v1522507343893" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>')
            ->with('categories',$categories);
    }
    public function processAddCourse(Request $request)
    {
        $coursesService = new coursesService();
        if($coursesService->createCourse($request))
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
}