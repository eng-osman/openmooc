<?php
namespace OpenMooc\Courses\Repositories;

use OpenMooc\Courses\Models\CoursesStudents;
use Illuminate\Support\Facades\DB;

class coursesStudentsRepository
{
    public function addSubscription($data = [])
    {
        $subscription = new CoursesStudents();
        $subscription->student_id = $data['student'];
        $subscription->course_id  = $data['course'];

        return $subscription->save();
    }

    public function getAllSubscriptions()
    {
         $subscriptions = DB::table('courses_students')
            ->join('users', 'users.id', '=', 'courses_students.student_id')
            ->join('courses', 'courses.course_id', '=', 'courses_students.course_id')
            ->select('users.username', 'courses.course_name', 'courses_students.*')
            ->orderBy('id', 'DESC')
            ->get();
         return $subscriptions;
    }

    public function approve($id)
    {
        $subscription = CoursesStudents::find($id);
        $subscription->is_approved = 1;
        return $subscription->save();
    }

    public function unApprove($id)
    {
        $subscription = CoursesStudents::find($id);
        $subscription->is_approved = 0;
        return $subscription->save();
    }
    public function getStudentSubscription($student_id)
    {
        $student = DB::table('courses_students')
            ->join('users', 'users.id', '=', 'courses_students.student_id')
            ->join('courses', 'courses.course_id', '=', 'courses_students.course_id')
            ->where('users.id','=', $student_id)
            ->select('users.username', 'courses.course_name', 'courses_students.*')->get();
        return $student;
    }

    public function showStudentsInCourse($course_id)
    {
        $students = DB::table('courses_students')
            ->join('users', 'users.id', '=', 'courses_students.student_id')
            ->where('courses_students.course_id','=', $course_id)
            ->select('users.username', 'courses_students.*')->get();
        return $students;
    }

    public function getAllInstructorStudents($instructor_id)
    {
        $students = DB::table('courses_students')
            ->join('users', 'users.id','=','courses_students.student_id')
            ->join('courses','courses.course_id','=','courses_students.course_id')
            ->where('courses.course_instructor','=',$instructor_id)
            ->where('users.user_group','=',2)
            ->select('users.username','users.is_active as user_status','courses.course_name',
                'courses.is_active as course_status', 'courses.course_instructor','courses_students.is_approved','courses_students.id as subscription_id')
            ->get();
        return $students;

    }
}