<?php

namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;

class coursesRepository extends Repository
{
    public function createCourse($courseData)
    {
        $course = new Courses();
        $course->course_name        = $courseData['title'];
        $course->course_category    = $courseData['category'];
        $course->course_instructor  = $courseData['instructor'];
        $course->course_description = $courseData['description'];
        $course->is_active          = $courseData['active'];

        if($course->save())
            return true;

        return false;
    }

    public function getCourses()
    {
        return Courses::orderBy('course_id','DESC')->get();
    }
}