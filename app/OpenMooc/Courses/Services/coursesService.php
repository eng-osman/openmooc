<?php

namespace OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesRepository;
use OpenMooc\Service;
use Validator;
class coursesService extends Service
{
    public function createCourse($request)
    {
        $rules = [
            'title'         => 'required|min:3|max:250',
            'description'   => 'required',
            'category'      => 'required',
            'active'        => 'required',
            'instructor'    => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        $coursesRepository = new coursesRepository();

        if($coursesRepository->createCourse($request->all()))
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
}