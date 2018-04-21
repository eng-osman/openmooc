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

    // get students subscribe
    public function getStudent()
    {
        $subscribe = DB::table('courses_students')
            ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
            ->select('courses_students.*','courses.course_name','users.name')
            ->get();
        if(count($subscribe)>0)
            return $subscribe;
    }

    // get unapprove students subscribe
    public function getunapprovestudent()
    {
        $subscribe = DB::table('courses_students')
            ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
            ->where('courses_students.is_approved','=','0')
            ->select('courses_students.*','courses.course_name','users.name')
            ->get();
        if(count($subscribe)>0)
            return $subscribe;
    }

    // approve subscription
    public function approveSubscription($id,$status)
    {
        $student = CoursesStudents::find($id);
        $student->is_approved  = $status;
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

        if(count($user)>0){
            return $user;
        }else{
            return false;
        }
    }

    public function subscribenum()
    {
        return CoursesStudents::count();
    }

}