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

    public function courseRates () {
        return $this->hasMany('OpenMooc\Courses\Models\CoursesRate');

    }
}