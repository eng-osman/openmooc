<?php
/**
 * Created by PhpStorm.
 * User: syam
 * Date: 3/31/2018
 * Time: 4:10 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesService;

class coursesAPIController extends Controller
{
    private $coursesService;

    public function __construct()
    {
        $this->coursesService = new coursesService();
    }

    // show all course
    public function index()
    {
        $courses = $this->coursesService->getCourses();
        $statuscode = ($courses) ? 200 : 404;
        $allData = [];
        $allData['status']  = ($courses) ? true : false;
        $allData['message'] = ($courses) ? 'All Courses' : 'No courses Found';
        $allData['errors']  = [];
        $allData['data']    = $courses;

        return response()->json($allData,$statuscode);
    }

    // add new course to database
    public function store(Request $request)
    {
        $data = $request->json()->all();
        if($this->coursesService->addCourse($data)){
            $allData =[];
            $allData['status']  = true;
            $allData['message'] = 'course added';

            return response()->json($allData);

        }else{
            $allData =[];
            $allData['status']  = false;
            $allData['message'] = 'course not added';
            $allData['errors'] = $this->coursesService->errors();

            return response()->json($allData);
        }
    }

    // show course by id
    public function show($id)
    {
        $course = $this->coursesService->getCourse($id);
        $statuscode = ($course) ? 200 : 404;
        $allData = [];
        $allData['status']  = ($course) ? true : false;
        $allData['message'] = ($course) ? 'Courses Details' : 'Course Not Found';
        $allData['errors']  = [];
        $allData['data']    = $course;

        return response()->json($allData,$statuscode);
    }

    // update course in database
    public function update(Request $request)
    {
    }

    // delete course from database
    public function destroy($id)
    {
    }

    // get courses by category
    public function getCoursesByCategory($id)
    {
    }

    // get courses by instructor
    public function getCoursesByInstructor($id)
    {
    }

    // get courses by status
    public function getCoursesByActiveStatus($status)
    {
        $courses = $this->coursesService->getCoursesByActiveStatus($status);
        $responseData = [];
        $statusCode = ($courses)? 200 : 404;
        $responseData['status'] = ($courses) ? true : false ;
        $responseData['message'] = ($courses) ? 'coursrs details' : "course not found";
        $responseData['errors'] = [];
        $responseData['data'] = $courses;
        return response()->json($responseData,$statusCode);
    }

    // update courses status
    public function updateCourseActiveStatus($id,$status)
    {
        $Activestatus = $this->coursesService->updateCourseActiveStatus($id,$status);
        $responseData = [];
        $statusCode = ($Activestatus)? 200 : 404;
        $responseData['status'] = ($Activestatus) ? true : false ;
        $responseData['message'] = ($Activestatus) ? 'coursrs Update Status' : "course not found";
        $responseData['errors'] = [];
        $responseData['data'] = $Activestatus;
        return response()->json($responseData,$statusCode);
    }

}