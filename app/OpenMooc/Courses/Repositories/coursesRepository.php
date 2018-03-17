<?php

namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;

class coursesRepository extends Repository
{
    public function createCourse()
    {
        $course = new Courses();
        $course->save();
    }
}