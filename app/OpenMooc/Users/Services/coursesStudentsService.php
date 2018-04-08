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
        return ($subscription->approve($id)) ? true : $this->setError('Unable to approve subscription');
    }

    public function unApprove($id)
    {
        $subscription = new coursesStudentsRepository();
        return $subscription->unApprove($id) ? true : setError('Unable to approve subscription');
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
}