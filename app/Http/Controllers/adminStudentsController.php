<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesStudentsService;

class adminStudentsController extends Controller
{
    public function approveSub()
    {
        $studentService = new coursesStudentsService();
        $subscribe = $studentService->getStudent();
        return view('dashboard.admin.subscribe')->with('subscribe',$subscribe);
    }

    public function getunapprovestudent()
    {
        $studentService = new coursesStudentsService();
        $subscribe = $studentService->getunapprovestudent();
        return view('dashboard.admin.unapproved')->with('subscribe',$subscribe);
    }

    public function approveSubscription($id,$status)
    {
        $studentService = new coursesStudentsService();
        if($studentService->approveSubscription($id,$status)){
            return back();
        }else{
            return $studentService->errors();
        }
    }

    public function deleteSubscription($id)
    {
        $studentService = new coursesStudentsService();
        if($studentService->deleteSubscription($id)){
            return back();;
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
