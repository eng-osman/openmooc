<?php
namespace OpenMooc\Courses\Models;


use Illuminate\Database\Eloquent\Model;

class CoursesLessonsComments extends Model
{
    protected $table = 'courses_lessons_comments';
    protected $primaryKey = 'comment_id';
}