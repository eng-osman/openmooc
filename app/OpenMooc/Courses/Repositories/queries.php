<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/5/2018
 * Time: 3:13 PM
 */

namespace OpenMooc\Courses\Repositories;
use Illuminate\Support\Facades\DB;

class queries
{public function getUser($user_id){
$user=  DB::table('users')
->leftJoin('courses_categories', 'users.id', '=', 'courses_categories.created_by')
->select('users.username')
->where('courses_categories.category_id', '=', $user_id)
->get();}
}