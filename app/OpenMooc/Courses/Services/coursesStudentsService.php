<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:25 PM
 */

namespace OpenMooc\Courses\Services;


use OpenMooc\Courses\Repositories\coursesStudentsRepositories;
use OpenMooc\Service;
use Validator;
class coursesStudentsService extends Service
{
    public function addStudentToCourse($request)
    {
        $rules = [
            'student_id'  => 'required|integer',
            'course_id'   => 'required|integer',
            'is_approved' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $sRepository = new coursesStudentsRepositories();
        if($sRepository->addStudentToCourse($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function approveSubscription($request)
    {
        $rules = [
            'is_approved' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $sRepository = new coursesStudentsRepositories();
        $student = $sRepository->approveSubscription($request->all());
        if($student){
            return $student;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    // delete student from course (delete subscription)
    public function deleteSubscription($subId)
    {
        $sRepository = new coursesStudentsRepositories();
        if($sRepository->deleteSubscription($subId)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    // check subscription
    public function checkSubscription($studentId,$courseId)
    {
        $sRepository = new coursesStudentsRepositories();
        if($sRepository->checkSubscription($studentId,$courseId)){
            return 'true';
        }else{
            $this->setError('Error');
            return false;
        }
    }

}