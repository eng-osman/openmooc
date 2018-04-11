<?php
namespace  OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesStudentsRepository;
use OpenMooc\Service;
use Validator;

class coursesStudentsService extends Service
{
    public function addSubscription($request)
    {
        $v = Validator::make($request->all(), [
            'student'   =>'required',
            'course'    =>'required'
        ]);
        // if there are validation errors
        if($v->fails()):
            $this->setError($v->errors()->all());

            return false;
        endif;

        // if no validations Errors  Add subscription
        $coursesStudentsRepository = new coursesStudentsRepository();
        if($coursesStudentsRepository->addSubscription($request->all()));
            return true;
        $this->setError('Unable To save subscription');
        return false;
    }

    public function getAllSubscriptions()
    {
       $subscriptions = new coursesStudentsRepository();
        return $subscriptions->getAllSubscriptions();
    }

    public function approve($id)
    {
        $subscription = new coursesStudentsRepository();
        if ($subscription->approve($id))
            return 'subscription approved';

        $this->setError('Unable to approve subscription');
        return false;
    }

    public function unApprove($id)
    {
        $subscription = new coursesStudentsRepository();
        if($subscription->unApprove($id))
            return 'subscription un approved';

        $this->setError('Unable to approve subscription');
        return false;
    }

    public function getStudentSubscriptions($student_id)
    {
        $service = new coursesStudentsRepository();
        $subscriptions = $service->getStudentSubscription($student_id);

        if($subscriptions==[]):
            setError('no courses for this student');
            return false;
        endif;

        return $subscriptions;
    }

    public function showStudentsInCourse($course_id)
    {
        $repository = new coursesStudentsRepository();
        if(count($repository->showStudentsInCourse($course_id))> 0)
            return  $repository->showStudentsInCourse($course_id);

        $this->setError('no students in this course');
        return false;
    }

    public function getAllInstructorStudents($instructor_id)
    {
        $repository = new coursesStudentsRepository();
        if(count($repository->getAllInstructorStudents($instructor_id)))
            return $repository->getAllInstructorStudents($instructor_id);

        return false;
    }
    public function countMyStudents($instructor_id)
    {
        $repository = new coursesStudentsRepository();
        return count($repository->getAllInstructorStudents($instructor_id));
    }


}
