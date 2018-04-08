<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Services\categoryService;

class adminCategoriesController extends Controller
{
    // show all Categories
    public function index()
    {
        $cService = new categoryService();
        $categories = $cService->getCategories();
        return view('dashboard.admin.categories')->with('categories',$categories);
    }

    // show add category form
    public function create()
    {
        return view('dashboard.admin.addcategory');
    }

    // add new category to database
    public function store(Request $request)
    {
        $cService = new categoryService();
        if($cService->addCategory($request)){
            return 'Category Added';
        }else{
            return $cService->errors();
        }
    }

    // show category by id
    public function show($id)
    {
        //
    }

    // show update form
    public function edit($id)
    {
        $cService = new categoryService();
        $category = $cService->getCategory($id);
        return view('dashboard.admin.updatecategory')->with('category',$category);
    }

    // update category in database
    public function update(Request $request, $id)
    {
        $cService = new categoryService();
        if($cService->updateCategory($request)){
            return 'Category Updated';
        }else{
            return $cService->errors();
        }
    }

    // delete category from database
    public function destroy($id)
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
        return view('dashboard.admin.catbystatus')->with('categories',$categories);
    }


    public function getCategoriesByCreatorId($creatId)
    {
        $cService = new categoryService();
        $categories = $cService->getCategoriesByCreatorId($creatId);
        return view('dashboard.admin.catbycreator')->with('categories',$categories);
    }

}
