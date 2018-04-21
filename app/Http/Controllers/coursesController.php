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
        $categories =  CoursesCategories::all();
        return view('course')->with('categories',$categories);

    }
    public function processAddCourse(Request $request)
    {
        $coursesService = new coursesService();
        if($coursesService->createCourse($request))
            return 'course add';

        return $coursesService->errors();
    }
}