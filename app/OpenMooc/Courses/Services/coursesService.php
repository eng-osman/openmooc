<?php

namespace OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesRepository;
use OpenMooc\Service;
use Validator;
use Illuminate\Http\Request;

class coursesService extends Service
{

    private $coursesRepo;

    public function __construct()
    {
        $this->coursesRepo = new coursesRepository();
    }

    public function addCourse($request)
    {
        $rules = [
            'name' => 'required|min:3|max:50',
            'category' => 'required',
            'instructor' => 'required',
            'description' => 'required|min:3|max:250',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store
        if ($this->coursesRepo->addCourse($request->all()))
            return true;

        $this->setError('Error Saving to database in courses ');
        return false;
    }


    public function getCourses()
    {
        return $this->coursesRepo->getCourses();
    }

// update
    public function updateCourse($req)
    {
        $rules = [
            'course_name' => 'required|min:3|max:250',
            'course_category' => 'required',
            'course_instructor' => 'required',
            'course_description' => 'required',
            'course_cover' => 'required',
            'is_active' => 'required',
        ];
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->coursesRepo->updateCourse($req->all()))
            return true;

        $this->setError('Error updating to database in courses ');
        return false;
    }

    public function updateCourseActiveStatus($req)
    {
        $rules = [

            'is_active' => 'required',
        ];
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->coursesRepo->updateCourseActiveStatus($req->all()))
            return true;

        $this->setError('Error updating to database in courses status ');
        return false;
    }

    public function deleteCourse($id = 0)
    {
        if ($this->coursesRepo->deleteCourse($id)) {
            return true;
        }
        $this->setError('Error deleteing from courses  database');
        return false;


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
        return $this->coursesRepo->getCoursesByActiveStatus();
    }

    public function getCourse($id)
    {
        return $this->coursesRepo->getCourse($id);
    }

    public function searchCourses($keywords)
    {
        return $this->coursesRepo->searchCourses($keywords);
    }

}