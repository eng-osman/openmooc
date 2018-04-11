<?php
namespace OpenMooc\Courses\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table='courses';
    protected $primaryKey = 'course_id';

    public function courseRates () {
        return $this->hasMany('OpenMooc\Courses\Models\CoursesRate');
    }
}