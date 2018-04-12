<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/6/2018
 * Time: 4:13 PM
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use OpenMooc\Courses\Services\coursesCategoriesService;
use OpenMooc\Users\Services\usersService;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class courseCategoryController extends Controller
{
    private $coursesCategoryService;

    public function __construct()
    {
        $this->coursesCategoryService = new coursesCategoriesService();
    }

    public function addCategory()
    {
        $users = DB::table('users')->get();
        return view('addcategory')
            ->with('users', $users);
    }

    public function processAddCategory(Request $request)
    {
        if ($this->coursesCategoryService->addCategory($request))
            return 'course category Added';

        return $this->coursesCategoryService->errors();
    }

    public function deleteCategory($id = 0)
    {
        if ($this->coursesCategoryService->deleteCategory($id))
            return 'course category deleted';
        return $this->coursesCategoryService->errors();
    }

    public function getCategories()
    {
        $courseCategories = $this->coursesCategoryService->getCategories();

        return view('categories')
            ->with('categriesList', $courseCategories);
    }

    public function getCategory($id = 0)
    {
        $category = $this->coursesCategoryService->getCategory($id);
        if (count($category) > 0) {
            return view('categories')
                ->with('categriesList', $category);
        } else {
            return 'there is no course category match this id';
        }
    }

    public function getCategoriesByStatus($status = 1)
    {
        $categories = $this->coursesCategoryService->getCategoriesByStatus($status);
        if (count($categories) > 0) {
            return view('categories')
                ->with('categriesList', $categories);
        } else {
            return 'there is no course category match this group id';
        }
    }

    public function getCategoriesByCreatorId($creatorid)
    {
        $categories = $this->coursesCategoryService->getCategoriesByCreatorId($creatorid);
        if (count($categories) > 0) {
            return view('categories')
                ->with('categriesList', $categories);
        } else {
            return 'there is no course category match this group id';
        }
    }

    public function updateCategory($id = 0)
    {
        $courseCategory = DB::table('courses_categories')
            ->where('courses_categories.category_id', '=', $id)
            ->get();
        if (count($courseCategory) > 0) {
            $users = DB::table('users')->get();
            return view('updatecoursecategory')
                ->with('users', $users)->with('category', $courseCategory);
        }
        return 'there no course category match this id';
    }

    public function processupdateCategory(Request $request)
    {
        if ($this->coursesCategoryService->updateCategory($request))
            return 'course category updated';

        return $this->coursesCategoryService->errors();
    }
}