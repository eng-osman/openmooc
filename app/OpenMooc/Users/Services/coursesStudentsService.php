<?php
namespace  OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesStudentsRepository;
use OpenMooc\Service;
use Validator;

class coursesStudentsService extends Service
{
    private $coursesStudentsRepository;
    public function __construct()
    {
        $this->coursesStudentsRepository = new coursesStudentsRepository();
    }

    public function addSubscription($data = [])
    {
        $v = Validator::make($data, [
            'student'   =>'required',
            'course'    =>'required'
        ]);
        // if there are validation errors
        if($v->fails()):
            $this->setError($v->errors()->all());
            return false;
        endif;

        // if no validations Errors  Add subscription
        if ($this->coursesStudentsRepository->addSubscription($data))
            return true;

        $this->setError('Failed to save subscription');
        return false;
    }

    public function getAllSubscriptions()
    {
        if(count($this->coursesStudentsRepository->getAllSubscriptions())>0)
            return $this->coursesStudentsRepository->getAllSubscriptions();

        $this->setError('No subscriptions to view');
        return false;
    }

    public function approve($id)
    {
        $subscription = $this->coursesStudentsRepository->approve($id);
        if ($subscription)
            return true;

        $this->setError('Error approving subscription');
        return false;
    }

    public function unApprove($id)
    {
        $subscription = $this->coursesStudentsRepository->unApprove($id);
        if($subscription)
            return true;

        $this->setError('Error un approving subscription');
        return false;
    }

    public function deleteSubscription($id)
    {
        $delete =  $this->coursesStudentsRepository->deleteSubscription($id);
        if($delete)
            return true;
        $this->setError('Failed to delete subscription');
        return false;
    }

    public function getStudentSubscriptions($student_id)
    {
        $subscriptions =$this->coursesStudentsRepository->getStudentSubscription($student_id);
        if(count($subscriptions)>0)
            return $subscriptions;

        $this->setError('This students has no subscription');
        return false;
    }

    public function showStudentsInCourse($course_id)
    {
        $students = $this->coursesStudentsRepository->showStudentsInCourse($course_id);
        if(count($students)> 0)
            return  $students;

        $this->setError('this course has no students subscription');
        return false;
    }

    public function getAllInstructorStudents($instructor_id)
    {
        $instructorStudents = $this->coursesStudentsRepository->getAllInstructorStudents($instructor_id);
        if (count($instructorStudents) > 0)
            return $instructorStudents;

        $this->setError('This instructor has no students subscription');
        return false;
    }
    public function countMyStudents($instructor_id)
    {
        return count($this->coursesStudentsRepository->getAllInstructorStudents($instructor_id));
    }


}
