<?php

namespace App\Http\Controllers;
use OpenMooc\Courses\Services\coursesStudentService;
use Validator;

class coursesStudentsController extends Controller
{
    public function getAll()
    {
        $csService= new coursesStudentService();
       $coursesStudents = $csService->getCoursesStudents();
       if (isset($coursesStudents))
          return view('courseStud')
            ->with('cStudent',$coursesStudents);
       echo "Something Is wRong";
    }

    public function delCourseStudentById(){
        $csService= new coursesStudentService();
        if($csService->delCoursesStudents(7))
            return "THe row is Deleted";
        return "Error No thing is Deleted";
    }

    public function addCourseStudent(){
        $csService= new coursesStudentService();
        if($csService->AddCoursesStudents(4,6,1)) {
            return "THe row is Added";
        }else{
        return "Error No thing is Added";}
    }

}