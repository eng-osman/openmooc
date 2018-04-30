<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/3/2018
 * Time: 4:19 PM
 */

namespace OpenMooc\Users\Services;

use Validator;
use OpenMooc\Service;
use OpenMooc\Users\Repositories\usersGroupsRepository;

class userGroupsService extends Service
{
    public function addUserGroup($request)
    {
        $validator = Validator::make($request->all(), [
            'group_name' => 'required|unique:users_groups|alpha'
        ]);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ugRepository = new usersGroupsRepository;
        if($ugRepository->addUserGroup($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function getAllGroups()
    {
        $ugRepository = new usersGroupsRepository();
        $groups = $ugRepository->getAllGroups();
        if($groups){
            return $groups;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function getGroupById($id)
    {
        $ugRepository = new usersGroupsRepository();
        $ug = $ugRepository->getGroupById($id);
        if($ug){
            return $ug;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function updateUserGroup($request)
    {
        $validator = Validator::make($request->all(), [
            'group_name' => 'required|unique:users_groups|alpha',
            'group_id'   => 'required'
        ]);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $ugRepository = new usersGroupsRepository;
        if($ugRepository->updateUserGroup($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function deleteUserGroup($id)
    {
        $ugRepository = new usersGroupsRepository();
        if($ugRepository->deleteUserGroup($id)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }
}