<?php
/**
 * Created by PhpStorm.
 * User: syam
 * Date: 3/31/2018
 * Time: 4:10 PM
 */

namespace App\Http\Controllers;


use OpenMooc\Courses\Services\coursesService;

class coursesAPIController extends Controller
{
    public function courses()
    {
        $coursesService = new coursesService();
        $courses = $coursesService->getCourses();

        return response()->json($courses);
    }
}