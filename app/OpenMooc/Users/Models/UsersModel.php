<?php
/**
 * Created by PhpStorm.
 * User: masne
 * Date: 4/6/2018
 * Time: 11:10 AM
 */

namespace OpenMooc\Users\Models;


use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';


public function coursesStudents()
{
    return $this->hasMany('OpenMooc\Courses\Models\CoursesStudents', 'foreign_key', 'student_id');
}
}