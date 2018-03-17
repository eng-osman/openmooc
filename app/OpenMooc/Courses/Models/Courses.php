<?php
namespace OpenMooc\Courses\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table='courses';
    protected $primaryKey = 'course_id';
}