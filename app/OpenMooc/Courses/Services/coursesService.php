<?php

namespace OpenMooc\Courses\Services;

use Illuminate\Http\Request;
use OpenMooc\Courses\Repositories\coursesRepository;
use OpenMooc\Service;
use Validator;

class coursesService extends Service
{

    private $coursesRepo;

    public function __construct()
    {
        $this->coursesRepo = new coursesRepository();
    }

    public function addCourse($data)
    {
        $rules = [
            'course'        => 'required|min:3|max:100',
            'category'      => 'required|',
            'instructor'    => 'required',
            'description'   => 'required|min:3|max:250',
            'status'        => 'required',
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store
        if ($this->coursesRepo->addCourse($data))
            return true;

        $this->setError('Error saving data');
        return false;
    }


    public function getCourses()
    {
        return $this->coursesRepo->getCourses();
    }

// update
    public function updateCourseProcess($request)
    {
        $rules = [
            'course_name' => 'required|min:3|max:250',
            'course_category' => 'required',
            'course_instructor' => 'required',
            'course_description' => 'required',
            'is_active' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->coursesRepo->updateCourseProcess($request->all()))
            return true;

        $this->setError('Error Saving to database in courses ');
        return false;
    }


    public function deleteCourse($id)
    {
        return $this->coursesRepo->deleteCourse($id);
    }

    public function getCoursesByStudentId($student_id)
    {
        return $this->coursesRepo->getCoursesByStudentId($student_id);
    }

    public function getCoursesByInstructor($id)
    {
        return $this->coursesRepo->getCoursesByInstructor($id);
    }

    public function getCoursesByCategory($category_id)
    {
        return $this->coursesRepo->getCoursesByCategory($category_id);
    }

    public function getCoursesByActiveStatus($status)
    {
        return $this->coursesRepo->getCoursesByActiveStatus($status);
    }

    public function getCourse($id)
    {
        return $this->coursesRepo->getCourse($id);
    }

    public function searchCourses($keywords)
    {
        return $this->coursesRepo->searchCourses($keywords);
    }

    public function countMyCourses($instructor_id)
    {
        return count($this->coursesRepo->getCoursesByInstructor($instructor_id));
    }

}