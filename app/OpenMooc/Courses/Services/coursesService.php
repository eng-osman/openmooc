<?php

namespace OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesRepository;
use OpenMooc\Service;
use Validator;
class coursesService extends Service
{
    public function addCourse($data)
    {
        $rules = [
            'title'         => 'required|max:100',
            'category'      => 'required|integer',
            'instructor'    => 'required|integer',
            'description'   => 'required|max:1000',
            'active'        => 'required|boolean',
            'cover'         => 'required|image'
        ];

        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        //store
        $coursesRepository = new coursesRepository();

        if($coursesRepository->addCourse($data))
            return true;

        $this->setError('Error Saving to database');
        return false;
    }

    public function getCourses()
    {
        $coursesRepo = new coursesRepository();
        $courses = $coursesRepo->getCourses();
        foreach ($courses as $course)
        {
            $course->course_name = strtoupper($course->course_name);
        }
        return $courses;
    }

    public function getCourse($id)
    {
        $cRepository = new coursesRepository();
        $course = $cRepository->getCourse($id);
        if($course){
            return $course;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getCoursesByCategory($id)
    {
        $cRepository = new coursesRepository();
        $courses = $cRepository->getCoursesByCategory($id);
        if($courses){
            return $courses;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getCoursesByInstructor($id)
    {
        $cRepository = new coursesRepository();
        $courses = $cRepository->getCoursesByInstructor($id);
        if($courses){
            return $courses;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getCoursesByStudentId($id)
    {
        $cRepository = new coursesRepository();
        $courses = $cRepository->getCoursesByStudentId($id);
        if($courses){
            return $courses;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getCoursesByActiveStatus($status)
    {
        $cRepository = new coursesRepository();
        $courses = $cRepository->getCoursesByActiveStatus($status);
        if($courses){
            return $courses;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function updateCourse($data)
    {
        $rules = [
            'course_name'          => 'required|max:100',
            'course_category'      => 'required|integer',
            'course_instructor'    => 'required|integer',
            'course_description'   => 'required|max:1000',
            'is_active'            => 'required|boolean',
            'course_cover'         => 'required'
        ];

        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store
        $coursesRepository = new coursesRepository();

        if($coursesRepository->updateCourse($data))
            return true;

        $this->setError('Error Saving to database');
        return false;
    }


    public function updateCourseActiveStatus($id,$status)
    {
        //store
        $coursesRepository = new coursesRepository();

        if($coursesRepository->updateCourseActiveStatus($id,$status))
            return true;

        $this->setError('Error Saving to database');
        return false;
    }


    public function deleteCourse($id)
    {
        $cRepository = new coursesRepository();
        if($cRepository->deleteCourse($id)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function searchCourses($keyword)
    {
        $cRepository = new coursesRepository();
        $courses = $cRepository->searchCourses($keyword);
        if ($courses) {
            return $courses;
        } else {
            $this->setError('Error');
            return false;
        }
    }
    public function coursesnum()
    {
        $cRepository = new coursesRepository();
        $courses = $cRepository->coursesnum();
        if ($courses) {
            return $courses;
        } else {
            $this->setError('Error');
            return false;
        }
    }
}