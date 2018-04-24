<?php

namespace OpenMooc\Courses\Repositories;
use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesStudents;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class coursesStudentsRepositories extends  Repository
{


    /**
     * add studen to course
     * @param $data
     * @return bool
     */
    public function addStudentToCourse($Data)
    {
        $student = new CoursesStudents();
        $student->student_id      = $Data['student_id'];
        $student->course_id       = $Data['course_id'];
        $student->is_approved     = $Data['is_approved'];
        // store
        if($student->save())
            return true;
        else
            return false;

    }


    /**
     * approve or not approve subscription
     * @param $Data
     * @return bool
     */
    public function approveSubscription($Data)
    {
        $student = CoursesStudents::find($Data['id']);
        $student->is_approved  = $Data['is_approved'];
        //store
        if($student->save())
            return true;
        else
            return false;

    }


    /**
     * delete subscription by id
     * @param $subscriptionId
     * @return bool|string
     * @throws \Exception
     */
    public function deleteSubscription($subscriptionId)
    {
        $Subscription = CoursesStudents::find($subscriptionId);
        if(!$Subscription)
        {
            return 'this sub is not found or removed';
        }
        else
        {
            $Subscription->delete();
            return true;
        }
    }

    /**
     * check Subscription
     * @param $studentId
     * @param $courseId
     * @return bool
     */

    public function checkSubscription($studentId,$courseId)
    {
        $user = DB::table('courses_students')->where([
            ['student_id',  '=', $studentId],
            ['course_id',   '=', $courseId],
            ['is_approved', '=', '1']
        ])->first();
        if($user)
            return $user;
        else
            return false;

    }


}