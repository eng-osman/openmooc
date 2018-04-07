<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/4/2018
 * Time: 7:21 PM
 */

namespace OpenMooc\Courses\Services;


use Illuminate\Http\Request;
use OpenMooc\Courses\Repositories\coursesCategoriesRepositry;

use OpenMooc\Service;
use Validator;

class coursesCategoriesService extends Service
{
    private $coursesCategryRepo;

    public function __construct()
    {
        $this->coursesCategryRepo = new coursesCategoriesRepositry();
    }

    public function addCategory($request)
    {
        $rules = [
            'category_name' => 'required|min:3|max:250',
            'created_by' => 'required',
            'active' => 'required'

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store
        if ($this->coursesCategryRepo->addCategory($request->all()))
            return true;

        $this->setError('Error Saving to database in courses category');
        return false;
    }

    public function updateCategory(Request $req)
    {
        $rules = [
            'category_name' => 'required|min:3|max:250',
            'created_by' => 'required',
            'active' => 'required'

        ];
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->coursesCategryRepo->updateCategory($req->all()))
            return true;

        $this->setError('Error updating to database in courses category');
        return false;
    }

    public function deleteCategory($id = 0)
    {
        if ($this->coursesCategryRepo->deleteCategory($id)) {
            return true;
        }
        $this->setError('Error deleteing from courses Categories database');
        return false;
    }

    public function getCategories()
    {
        return $this->coursesCategryRepo->getCategories();
    }

    public function getCategory($id = 0)
    {
        return $this->coursesCategryRepo->getCategory($id);
    }

    public function getCategoriesByStatus($status = 1)
    {
        return $this->coursesCategryRepo->getCategoriesByStatus($status);
    }

    public function getCategoriesByCreatorId($creator_id)
    {
        return $this->coursesCategryRepo->getCategoriesByCreatorId($creator_id);
    }
}