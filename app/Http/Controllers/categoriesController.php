<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 5:58 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Courses\Services\categoryService;

class categoriesController extends Controller
{
    public function addCategory()
    {
        return view('addcategory');
    }

    public function processaddCategory(Request $request)
    {
        $cService = new categoryService();
        if($cService->addCategory($request)){
            return 'Category Added';
        }else{
            return $cService->errors();
        }
    }


    public function getCategories()
    {
        $cService = new categoryService();
        $categories = $cService->getCategories();
        return view('categories')->with('categories',$categories);
    }


    public function getCategory($id)
    {
        $cService = new categoryService();
        $category = $cService->getCategory($id);
        return view('updatecategory')->with('category',$category);
    }


    public function updateCategory(Request $request)
    {
        $cService = new categoryService();
        if($cService->updateCategory($request)){
            return 'Category Updated';
        }else{
        return $cService->errors();
        }
    }


    public function deleteCategory($id)
    {
        $cService = new categoryService();
        if($cService->deleteCategory($id)){
            return 'Category deleted';
        }else{
            return $cService->errors();
        }
    }


    public function getCategoriesByStatus($status)
    {
        $cService = new categoryService();
        $categories = $cService->getCategoriesByStatus($status);
        return view('categoriesByStatus')->with('categories',$categories);
    }


    public function getCategoriesByCreatorId($creatId)
    {
        $cService = new categoryService();
        $categories = $cService->getCategoriesByCreatorId($creatId);
        return view('categoriesByCreator')->with('categories',$categories);
    }
}