<?php

namespace OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesStudentsRepositories;
use OpenMooc\Service;
use Validator;

class coursesStudentsServices extends  Service
{

    /*
     * add studen to course
     * @param $request
     * @return bool
     */
    public function addStudentToCourse($request)
    {
        $rules = [
            'student_id'  => 'required|integer',
            'course_id'   => 'required|integer',
            'is_approved' => 'required'
        ];
        //validation
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        $studentRepo = new coursesStudentsRepositories();
        if ($studentRepo->addStudentToCourse($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Adding');
            return false;
        }
    }



    /**
     * approve or not approve subscription
     * @param $request
     * @return bool
     */
    public function approveSubscription($request)
    {
        $rules = [
            'is_approved' => 'required'
        ];

        //validation
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        $studentRepo = new coursesStudentsRepositories();
        $student = $studentRepo->approveSubscription($request->all());
        if ($student) {
            return $student;
        } else {
            $this->setError('Error Updating subs');
            return false;
        }
    }


    /**
     * delete subscription by id
     */
    public function deleteSubscription($subscriptionId)
    {

        $studentRepo = new coursesStudentsRepositories();
        if($studentRepo->deleteSubscription($subscriptionId))
        {
            return true;
        }
        else
        {
            $this->setError('Error Deleting Subs');
            return false;
        }
    }

    /**
     * return student
     */
    public function getStudent()
    {
        $serviceRepo = new coursesStudentsRepositories();
        $Students = $serviceRepo->getStudent();
        if($Students)
        {
            return $Students;
        }
        else
        {
            $this->setError('Error Retrieving Data');
            return false;
        }
    }

    /**
     * check
     * @param $studentId
     * @param $courseId
     * @return bool|string
     */
    public function checkSubscription($studentId,$courseId)
    {
        $studentRepo = new coursesStudentsRepositories();
        if($studentRepo->checkSubscription($studentId,$courseId))
        {
            return true;
        }
        else
        {
            $this->setError('Error Check Subs');
            return false;
        }
    }

}