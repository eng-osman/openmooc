<?php
namespace OpenMooc\Courses\Repositories;


use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesLessons;
use OpenMooc\Courses\Models\CoursesStudents;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class coursesStudentsRepositories extends Repository
{
    // add student to course
    public function addStudentToCourse($subscribeData)
    {
        $student = new CoursesStudents();
        $student->student_id      = $subscribeData['student_id'];
        $student->course_id       = $subscribeData['course_id'];
        $student->is_approved     = $subscribeData['is_approved'];
        if($student->save()){
            return true;
        }else{
            return false;
        }
    }

    // approve subscription
    public function approveSubscription($Data)
    {
        $student = CoursesStudents::find($Data['id']);
        $student->is_approved  = $Data['is_approved'];
        if($student->save()){
            return true;
        }else{
            return false;
        }
    }

    // delete student from course (delete subscription)
    public function deleteSubscription($subId)
    {
        $Subscription = CoursesStudents::find($subId);
        if(!$Subscription){
            return 'Not found';
        }else{
            $Subscription->delete();
            return true;
        }
    }

    // check subscription
    public function checkSubscription($studentId,$courseId)
    {
        $user = DB::table('courses_students')->where([
            ['student_id', '=', $studentId],
            ['course_id', '=', $courseId],
            ['is_approved', '=', '1']
        ])->first();

        if($user){
            return $user;
        }else{
            return false;
        }
    }

}