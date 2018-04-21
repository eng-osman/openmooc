<?php

namespace App\Http\Controllers;


use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Models\CoursesStudents;
use OpenMooc\Courses\Repositories\coursesStudentsRepository;
use OpenMooc\Courses\Services\coursesStudentsService;
use OpenMooc\Service;
use Illuminate\Http\Request;
use OpenMooc\Users\Models\Users;

class coursesStudentsController extends Controller
{

    public function addStudentSubscription()
    {
        //get all users who is activated and belongs to student group which = 2
        $students = Users::all()->where('is_active', '=', 1)->where('user_group', 2);
        // get all activate courses
        $courses = Courses::all()->where('is_active', 1);
        return view('subscriptions.add')->with('students', $students)->with('courses', $courses);
    }

    public function insertSubscription(Request $request)
    {
        $coursesStudents = new coursesStudentsService();
        return $coursesStudents->addSubscription($request) ? 'subscription saved' : Service::getError();
    }

    public function getAllSubscription()
    {
        $subscriptions = new coursesStudentsService();
        $subscriptions = $subscriptions->getAllSubscriptions();
        return view('subscriptions.all_subscriptions')->with('all', $subscriptions);
    }

    public function approveSubscription($id)
    {
        $service = new coursesStudentsService();
        return $service->approve($id) ? 'subscription approved' : $service->errors();
    }

    public function unApproveSubscription($id)
    {
        $service = new coursesStudentsService();
        return $service->unApprove($id) == true ? 'subscription un approved' : $service->errors();
    }


    public function deleteSubscription($id)
    {
        $sub = CoursesStudents::find($id)->delete();
        if ($sub) return 'subscription deleted';
        return 'no subscription with this id';
    }

    public function getStudentSubscription($id)
    {
        $subscription = new coursesStudentsService();
        $student = $subscription->getStudentSubscriptions($id);
        if ($student == false)
            return Service::getError();

        return view('subscriptions.student')->with('student', $student);
    }

    public function showStudentsInCourse($course_id)
    {
        $service = new coursesStudentsService();
        return view('course.students')->with('students', $service->showStudentsInCourse($course_id));
    }

    public function getAllInstructorStudents($instructor_id)
    {
        $service = new coursesStudentsRepository();
        $students = $service->getAllInstructorStudents($instructor_id);
        return view('instructor.allStudents')->with('students', $students);
    }
}