<?php

namespace OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\courses_StudentsRepository;
use OpenMooc\Service;
use Validator;
class coursesStudentService extends Service
{

    public function getCoursesStudents()
    {
        $corStudRepo = new courses_StudentsRepository();

        //$courseStudent = $corStudRepo->getAll();

        $courseStudent = $corStudRepo->getAll_joined();

        return $courseStudent;

    }
    public function delCoursesStudents($id){
        $corStudRepo = new courses_StudentsRepository();
        $courseStudent = $corStudRepo->delete($id);

    }

    public function AddCoursesStudents($studentId,$course_id,$is_approved){
        $corStudRepo = new courses_StudentsRepository();
        $courseStudent = $corStudRepo->add($studentId,$course_id,$is_approved);

    }
}