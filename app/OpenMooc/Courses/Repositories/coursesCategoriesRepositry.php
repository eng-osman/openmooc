<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/4/2018
 * Time: 7:16 PM
 */

namespace OpenMooc\Courses\Repositories;

use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\CoursesCategories;
use OpenMooc\Repository;


class coursesCategoriesRepositry extends Repository
{
    public function addCategory($categoryData)
    {
        $courses_categories = [
            'category_name' => $categoryData['category_name'],
            'created_by' => $categoryData['created_by'],
            'is_active' => $categoryData['active']
        ];

        if (DB::table('courses_categories')->insert([$courses_categories]))
            return true;
        return false;


    }

    public function updateCategory($categoryData)
    {
        $item = [
            'category_name' => $categoryData['category_name'],
            'created_by' => $categoryData['created_by'],
            'is_active' => $categoryData['active']

        ];
        // update Query
        if (DB::table('courses_categories')
            ->where('courses_categories.category_id', $categoryData['category_id'])
            ->update($item)
        )
            return true;
        return false;
    }

    public function deleteCategory($id = 0)
    {
        $CoursesCategories = CoursesCategories::find($id);
        if ($CoursesCategories) {
            $CoursesCategories->delete();
            return true;
        }
        return false;
    }

    public function getCategories()
    {
        $users = DB::table('courses_categories')
            ->join('users', 'users.id', '=', 'courses_categories.created_by')
            ->select('courses_categories.category_name', 'users.username', 'courses_categories.is_active')
            ->get();
        return $users;
    }

    public function getCategory($id = 0)
    {
        $user = DB::table('courses_categories')
            ->join('users', 'users.id', '=', 'courses_categories.created_by')
            ->select('courses_categories.category_name', 'users.username', 'courses_categories.is_active')
            ->where('courses_categories.category_id', '=', $id)
            ->get();
        return $user;
    }

    public function getCategoriesByStatus($status = 1)
    {
        $users = DB::table('courses_categories')
            ->join('users', 'users.id', '=', 'courses_categories.created_by')
            ->select('courses_categories.category_name', 'users.username', 'courses_categories.is_active')
            ->where('courses_categories.is_active', '=', $status)
            ->get();
        return $users;
    }

    public function getCategoriesByCreatorId($creatorid)
    {
        $users = DB::table('courses_categories')
            ->join('users', 'users.id', '=', 'courses_categories.created_by')
            ->select('courses_categories.category_name', 'users.username', 'courses_categories.is_active')
            ->where('courses_categories.created_by', '=', $creatorid)
            ->get();
        return $users;
    }
}