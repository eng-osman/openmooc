<?php


namespace OpenMooc\Courses\Services;
use Validator;
use OpenMooc\Service;
use OpenMooc\Courses\Repositories\coursesCategoriesRepositories;


class coursesCategoriesServices extends  Service
{

    //add category
    public function addCategory($request)
    {
        $rules = [
            'categoryName' => 'required|unique:courses_categories|min:5|max:50',
            'createdBy'    => 'required|integer',
            'isActive'     => 'required|boolean'
        ];

        //validation
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $categoryRepo = new coursesCategoriesRepositories();
        //check add
        if($categoryRepo->addCategory($request->all()))
        {
            return true;
        }
        else
         {
            $this->setError('Error');
            return false;
        }
    }


    //update category by id
    public function updateCategoryById($request)
    {
        $rules = [
            'categoryName' => 'required|unique:courses_categories|min:5|max:50',
            'createdBy'    => 'required|integer',
            'isActive'     => 'required|boolean'
        ];

        //validation
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $categoryRepo = new coursesCategoriesRepositories();
        if($categoryRepo->updateCategoryById($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error');
            return false;
        }
    }


    // delete categoryby id
    public function deleteCategoryById($id)
    {
        $categoryRepo = new coursesCategoriesRepositories();
        //check
        if($categoryRepo->deleteCategoryById($id))
        {
            return true;
        }
        else
        {
            $this->setError('Error when you deleting');
            return false;
        }
    }

    //get category by id
    public function getCategory($id)
    {
        $categoryRepo = new coursesCategoriesRepositories();
        $category = $categoryRepo->getCategoryById($id);
        if($category)
        {
            return $category;
        }
        else
        {
            $this->setError('Error retrieving data');
            return false;
        }
    }

    // get all categories
    public function getAllCategories()
    {
        $categoriesRepo = new coursesCategoriesRepositories();
        $categories = $categoriesRepo->getAllCategories();
        if($categories)
        {
            return $categories;
        }
        else
        {
            $this->setError('Error retrieving data');
            return false;
        }
    }

    // Get Categories By Active OR Not Active
    public function getCategoriesByStatus($activation)
    {
        $categoriesRepo = new coursesCategoriesRepositories();
        $categories = $categoriesRepo->getCategoriesByStatus($activation);
        if($categories){
            return $categories;
        }
        else
        {
            $this->setError('Error retrieving data');
            return false;
        }
    }

    // Get Categories By Creator
    public function getCategoriesByCreatorId($id)
    {
        $categoriesRepo = new coursesCategoriesRepositories();
        $categories = $categoriesRepo->getCategoriesByCreatorId($id);
        if($categories){
            return $categories;
        }
        else
        {
            $this->setError('Error retrieving data');
            return false;
        }
    }
}