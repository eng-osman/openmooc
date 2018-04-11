<?php
namespace OpenMooc\Courses\Models;

use Illuminate\Database\Eloquent\Model;

class CoursesRate extends Model
    {
    protected $table = 'courses_rate';
    protected $primaryKey = 'rate_id';

    public function userName (){

        return $this->belongsTo('OpenMooc\Users\Models\UsersModel','student_id');
        }

    public function courseName (){

        return $this->belongsTo('OpenMooc\Courses\Models\Courses','course_id');
        }
    }