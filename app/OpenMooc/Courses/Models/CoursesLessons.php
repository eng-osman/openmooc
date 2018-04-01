<?php
namespace OpenMooc\Courses\Models;
use Illuminate\Database\Eloquent\Model;

class CoursesLessons extends Model
{
    protected $table = 'courses_lessons';
    protected $primaryKey = 'lesson_id';
}