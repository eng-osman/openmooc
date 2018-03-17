<?php
namespace OpenMooc\Courses\Models;


use Illuminate\Database\Eloquent\Model;

class CoursesCategories extends Model
{
    protected $table = 'courses_categories';
    protected $primaryKey = 'category_id';
}