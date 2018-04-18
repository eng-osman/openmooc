<?php
namespace App\Http\Controllers;

use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Services\coursesService;

class adminController extends Controller
{
    public function index()
    {
        //service to get data
        $coursesService = new coursesService();
        $allCourse = $coursesService->getAllCourses();

        return view('dashboard.admin.index')
            ->with('courses',$allCourse);
    }
}