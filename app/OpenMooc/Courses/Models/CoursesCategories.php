<?php
namespace OpenMooc\Courses\Models;


use Illuminate\Database\Eloquent\Model;
use OpenMooc\Users\Models\Users;

class CoursesCategories extends Model
{
    protected $table = 'courses_categories';
    protected $primaryKey = 'category_id';
  /* public function Users(){
       return $this->belongsTo(Users::class);
   }*/
}