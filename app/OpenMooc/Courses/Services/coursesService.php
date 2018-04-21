<?php

namespace OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesRepository;
use OpenMooc\Service;
use Validator;
class coursesService extends Service
{
    //create course
    public  function addCourse($request)
    {
        $rules = [
            'courseName'           => 'required|min:5|max:255',
            'courseCategory'       => 'required|integer',
            'courseInstructor'     => 'required|integer',
            'courseDescription'    => 'required|min:20|max:1000',
            'courseCover'          => 'required',
            'courseActive'         => 'required|integer|boolean'
        ];

        //validation
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store course
        $courses = new coursesRepository();
        if ($courses->createCourse($request->all()))
            return true;

        //set error
        $this->setError('Error saving in DB');
        return false;

    }

    // get course by id
    public function getCourseById($id)
    {
        //use coursesRepository
        $courseRepository = new coursesRepository();
        $course = $courseRepository->getCourseById($id);

        //check
        if($course)
        {
            return $course;
        }
        else
        {
            $this->setError('Error geting course');
            return false;
        }
    }


    //get all course from DB
    public function getAllCourses()
    {
        //use coursesRepository
        $coursesRepo    = new coursesRepository();
        if($courses     = $coursesRepo->getAllCourses())
        {
            return $courses;
        }
    }


    // delete course by id
    public function deleteCourseById($id)
    {
        $courseRepo = new coursesRepository();
        if($course = $courseRepo->deleteCourseById($id))
        {
            return true;
        }
        else
        {
            $this->setError('Error Deleting');
            return false;
        }
    }

    //update courses by id
    public function updateCourseById($request)
    {
        $rules = [
            'courseName'           => 'required|min:5|max:255',
            'courseCategory'       => 'required|integer',
            'courseInstructor'     => 'required|integer',
            'courseDescription'    => 'required|min:20|max:1000',
            'courseCover'          => 'required',
            'courseActive'         => 'required|integer|boolean'
        ];

        //validation
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store course
        $courses = new coursesRepository();
        if ($courses->createCourse($request->all()))
            return true;

        //set error
        $this->setError('Error updating in DB');
        return false;

    }
    //update Course Active Status
    public function updateCourseActiveStatus($activation)
    {
        $coursesRepo = new coursesRepository();
        //check
        if($courses     = $coursesRepo->updateCourseActiveStatus($activation))
        {
            return $courses;
        }
        else
        {
            $this->setError('Error');
            return false;
        }
    }

    //get courses by instructor[name]
    public function getCoursesByInstructor($id)
    {
        $coursesRepo = new coursesRepository();
        if($courses = $coursesRepo->getCoursesByInstructor($id))
        {
            return $courses;
        }
        else
        {
            $this->setError('Error');
            return false;
        }
    }


    // get courses by student id

    public function getCoursesByStudentId($studentId)
    {
        $courseRepo = new coursesRepository();
        if($course     = $courseRepo->getCoursesByStudentId($studentId))
        {
            return $course;
        }
        else
        {
            $this->setError('Error to retrieve  data');
            return false;
        }
    }

    //get course by category id
    public function getCourseByCategoryId($id)
    {
        $courseRepo = new coursesRepository();
        if($course     = $courseRepo->getCourseByCategoryId($id))
        {
            return $course;
        }
        else
        {
            $this->setError('Error to retrieve  data');
            return false;
        }

    }

    //search courses
    public function searchCourses($keyword)
    {

        $courseRepo = new coursesRepository();
        if($course     = $courseRepo->searchCourses($keyword))
        {
            return $course;
        }
        else
        {
            $this->setError('Error search  data');
            return false;
        }
    }

}