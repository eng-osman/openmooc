<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 3/21/2018
 * Time: 11:26 PM
 */

namespace OpenMooc\Courses\Repositories;

use OpenMooc\Courses\Models\CoursesCategories;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class categoryRepository extends Repository
{
    // add Category
    public function addCategory($categoryData)
    {
        $category = new CoursesCategories();
        $category->category_name = $categoryData['category_name'];
        $category->created_by    = $categoryData['created_by'];
        $category->is_active     = $categoryData['is_active'];
        if($category->save()){
            return true;
        }else{
            return false;
        }
    }

    // get all Categories
    public function getCategories()
    {
        $categories = DB::table('courses_categories')
            ->leftJoin('users', 'courses_categories.created_by', '=', 'users.id')
            ->select('courses_categories.*','users.name')
            ->get();
        if(count($categories)>0)
           return $categories;
    }

    // get category By Id
    public function getCategory($id)
    {
        return CoursesCategories::find($id);
    }

    //update category
    public function updateCategory($data)
    {
        $category = CoursesCategories::find($data['id']);
        $category->category_name = $data['category_name'];
        $category->is_active     = $data['is_active'];
        if($category->save()){
            return true;
        }else{
            return false;
        }
    }

    // delete category
    public function deleteCategory($id)
    {
        $category = CoursesCategories::find($id);
        if(!$category){
            return 'category not found';
        }else{
            $category->delete();
            return true;
        }
    }

    // get category by status
    public function getCategoriesByStatus($status)
    {
        $categories = DB::table('courses_categories')
            ->leftJoin('users', 'courses_categories.created_by', '=', 'users.id')
            ->select('courses_categories.*','users.name')
            ->where('courses_categories.is_active','=',$status)
            ->get();
        if(count($categories)>0)
           return $categories;
    }

    // get category by creator
    public function getCategoriesByCreatorId($id)
    {
        $categories = DB::table('courses_categories')
            ->leftJoin('users', 'courses_categories.created_by', '=', 'users.id')
            ->select('courses_categories.*','users.name')
            ->where('courses_categories.created_by','=',$id)
            ->get();
        if(count($categories)>0)
           return $categories;
    }

    // update category status
    public function updateCategoryStatus($id,$status)
    {
        $categories = CoursesCategories::find($id);
        $categories->is_active = $status;
        if($categories->save()){
            return true;
        }else{
            return false;
        }
    }

    public function categoriesnum()
    {
        return CoursesCategories::count();
    }
}