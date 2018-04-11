<?php

namespace OpenMooc\Courses\Models;

use Illuminate\Database\Eloquent\Model;

class CoursesStudents extends Model
{
    protected $table = 'courses_students';

    public function User_Name()
    {
        return $this->belongsTo('OpenMooc\Users\Models\User');
    }
}