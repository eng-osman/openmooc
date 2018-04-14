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
        $allCourse = $coursesService->getCourses();

        return view('dashboard.admin.index')
            ->with('courses',$allCourse);
    }
}
// end