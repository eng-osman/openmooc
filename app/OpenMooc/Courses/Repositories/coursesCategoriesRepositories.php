<?php

namespace OpenMooc\Courses\Repositories;

use OpenMooc\Repository;
use OpenMooc\Courses\Models\CoursesCategories;
use Illuminate\Support\Facades\DB;

class coursesCategoriesRepositories extends Repository
{

    //add category
    public function addCategory($data =  [])
    {
        $category = new CoursesCategories();
        $category->category_name = $data['categoryName'];
        $category->created_by    = $data['createdBy'];
        $category->is_active     = $data['isActive'];

        //check
        if($category->save())
            return true;
        else
            return false;

    }

    //update Category by id
    public function updateCategoryById($data)
    {
        $category = CoursesCategories::find($data['id']);
        $category->category_name = $data['categoryName'];
        $category->created_by    = $data['createdBy'];
        $category->is_active     = $data['isActive'];

        //check
        if($category->save())
            return true;
        else
            return false;

    }

    // delete categoryby id
    public function deleteCategoryById($id)
    {
        $category = CoursesCategories::find($id);

        if(!$category)
        {
            return 'this category is not fount or deleted';
        }
        else
        {
            $category->delete();
            return true;
        }
    }

    // get category by id
    public function getCategoryById($id)
    {
        $category =  CoursesCategories::find($id);

        if($category)
            return $category;
        else
            return false;
    }


    // get all categories
    public function getAllCategories()
    {
        $categories = DB::table('courses_categories')
            ->leftJoin('users', 'courses_categories.created_by', '=', 'users.id')
            ->get();
        if( $categories  &&   count($categories) > 0)
            return $categories;
    }

    // Get Categories By Active OR Not Active
    public function getCategoriesByStatus($activation)
    {
        $categories = DB::table('courses_categories')
            ->leftJoin('users', 'courses_categories.created_by', '=', 'users.id')
            ->where('courses_categories.is_active','=',$activation)
            ->get();
        //check
        if(count($categories) > 0)
            return $categories;
    }

    // Get Categories By Creator
    public function getCategoriesByCreatorId($id)
    {
        $categories = DB::table('courses_categories')
            ->leftJoin('users', 'courses_categories.created_by', '=', 'users.id')
            ->where('courses_categories.created_by','=',$id)
            ->get();
        if(count($categories) > 0)
            return $categories;
    }
}