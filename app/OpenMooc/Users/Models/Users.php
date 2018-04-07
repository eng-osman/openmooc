<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/4/2018
 * Time: 7:36 PM
 */

namespace OpenMooc\Users\Models;

use Illuminate\Database\Eloquent\Model;
use OpenMooc\Courses\Models\CoursesCategories;


class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public  function  CoursesCategories(){
        return $this->hasMany('CoursesCategories');
    }
}