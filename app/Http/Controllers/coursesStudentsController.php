<?php

namespace App\Http\Controllers;


use OpenMooc\Courses\Models\CoursesStudents;
use OpenMooc\Courses\Services\coursesStudentsService;
use OpenMooc\Service;
use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesModel;
use OpenMooc\Users\Models\usersModel;

class coursesStudentsController extends Controller
{

    public function AddStudentSubscription()
    {
        $students = usersModel::all()->where('user_group','=',2)->where('is_active','=',1);
        $course = CoursesModel::all()->where('is_active','=',1);
        return view('subscriptions.add')->with('students', $students)->with('courses', $course);
    }

    public function insertSubscription(Request $request)
    {
        $coursesStudents = new coursesStudentsService();
        return $coursesStudents->addSubscription($request) ? 'subscription saved': Service::getError();
    }

    public function getAllSubscription()
    {
       $subscriptions = new coursesStudentsService();
       $subscriptions = $subscriptions->getAllSubscriptions();
       return  $subscriptions;
    }

    public function approveSubscription($id)
    {
        $service = new coursesStudentsService();
       return $service->approve($id) ? 'subscription approved': Service::getError();
    }

    public function unApproveSubscription($id)
    {
       $service = new coursesStudentsService();
       return $service->unApprove($id)==true ? 'subscription un approved': $service::getError();
    }


    public function deleteSubscription($id)
    {
        $sub = CoursesStudents::find($id)->delete();
        if($sub) return 'subscription deleted';
    }

    public function getStudentSubscription($id)
    {
        $subscription = new coursesStudentsService();
        $student = $subscription->getStudentSubscriptions($id);
        if($student==false)
            return  Service::getError();

        return view('subscriptions.student')->with('student',$student);
    }
}