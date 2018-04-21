<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 6:01 PM
 */

namespace OpenMooc\Courses\Services;

use Validator;
use OpenMooc\Service;
use OpenMooc\Courses\Repositories\categoryRepository;

class categoryService extends Service
{
    public function addCategory($request)
    {
        $rules = [
            'category_name' => 'required|unique:courses_categories|max:20',
            'created_by'    => 'required|integer',
            'is_active'     => 'required|boolean'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $cRepository = new categoryRepository();
        if($cRepository->addCategory($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getCategories()
    {
        $cRepository = new categoryRepository();
        $categories = $cRepository->getCategories();
        if($categories){
            return $categories;
        }else {
            $this->setError('Error');
            return false;
        }
    }


    public function getCategory($id)
    {
        $cRepository = new categoryRepository();
        $category = $cRepository->getCategory($id);
        if($category){
            return $category;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function updateCategory($request)
    {
        $rules = [
            'category_name' => 'required|max:20',
            'created_by'    => 'required|boolean',
            'is_active'     => 'required|boolean'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $cRepository = new categoryRepository();
        if($cRepository->updateCategory($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function deleteCategory($id)
    {
        $cRepository = new categoryRepository();
        if($cRepository->deleteCategory($id)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getCategoriesByStatus($status)
    {
        $cRepository = new categoryRepository();
        $categories = $cRepository->getCategoriesByStatus($status);
        if($categories){
            return $categories;
        }else {
            $this->setError('Error');
            return false;
        }
    }


    public function getCategoriesByCreatorId($creatId)
    {
        $cRepository = new categoryRepository();
        $categories = $cRepository->getCategoriesByCreatorId($creatId);
        if($categories){
            return $categories;
        }else {
            $this->setError('Error');
            return false;
        }
    }

    public function updateCategoryStatus($id,$status)
    {
        //store
        $cRepository = new categoryRepository();

        if($cRepository->updateCategoryStatus($id,$status))
            return true;

        $this->setError('Error Saving to database');
        return false;
    }

    public function categoriesnum()
    {
        //store
        $cRepository = new categoryRepository();
        $categoriesnum = $cRepository->categoriesnum();
        if($categoriesnum)
            return $categoriesnum;

        $this->setError('Error Saving to database');
        return false;
    }
}