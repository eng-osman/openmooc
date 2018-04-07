<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:26 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesStudentsService;

class coursesStudentsController extends Controller
{
    public function addStudent()
    {
        return view('addstudent');
    }
    public function addStudentToCourse(Request $request)
    {
        $studentService = new coursesStudentsService();
        if($studentService->addStudentToCourse($request)){
            return ' student added';
        }else{
            return $studentService->errors();
        }
    }

    public function approveSub()
    {
        return view('approvestudent');
    }

    public function approveSubscription(Request $request)
    {
        $studentService = new coursesStudentsService();
        if($studentService->approveSubscription($request)){
            return 'Approved';
        }else{
            return $studentService->errors();
        }
    }

    public function deleteSubscription($id)
    {
        $studentService = new coursesStudentsService();
        if($studentService->deleteSubscription($id)){
            return 'deleted';
        }else{
            return $studentService->errors();
        }
    }

    public function checkSubscription($studentId,$courseId)
    {
        $studentService = new coursesStudentsService();
        $student = $studentService->checkSubscription($studentId,$courseId);
            return view('check')->with('student',$student);
    }

}