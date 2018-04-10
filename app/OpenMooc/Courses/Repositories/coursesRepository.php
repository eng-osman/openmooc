<?php

namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;

class coursesRepository extends Repository
{
    public  function createCourse($data= [])
    {
        //valid
        $course = new Courses();
        $course->course_name            = $data['title'];
        $course->course_description     = $data['description'];
        $course->course_category        = $data['category'];
        $course->is_active              = $data['active'];
        $course->course_instructor      = $data['instructor'];

        if($course->save())
            return true;

        return false;

    }
}