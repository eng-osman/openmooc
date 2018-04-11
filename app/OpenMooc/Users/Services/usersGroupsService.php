<?php


namespace OpenMooc\Users\Services;

use OpenMooc\Service;
use OpenMooc\Users\Repositories\usersGroupsRepository;
use Validator;

class usersGroupsService extends Service
{

    /**
     * add user_group
     * @param $request
     * @return bool
     */
    public function addUserGroup($request)
    {
        $rules = [
            'group_name' => 'required|unique:users_groups|alpha_dash'
        ];
        //validation
        $validator = Validator::make($request->all(),$rules );
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $userGroupRepo = new usersGroupsRepository();
        if($userGroupRepo->addUserGroup($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Adding');
            return false;
        }
    }

    /**
     * update user group by id
     * @param $request
     * @return bool
     */
    public function updateUserGroup($request)
    {
        $rules = [
            'group_name' => 'required|unique:users_groups|alpha_dash',
        ];
        //validation
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $userGroupRepo = new usersGroupsRepository;
        if($userGroupRepo->updateUserGroup($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Updating');
            return false;
        }
    }

    /**
     * delete user group
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function deleteUserGroup($id)
    {
        $userGroupRepo = new usersGroupsRepository();
        if($userGroupRepo->deleteUserGroup($id))
        {
            return true;
        }
        else
        {
            $this->setError('Error Deleting');
            return false;
        }
    }

    /**
     * delet usergroup by id
     * @param $id
     * @return bool
     */
    public function getUsersGroupById($id)
    {
        $userGroupRepo = new usersGroupsRepository();
        $userGroup = $userGroupRepo->getUsersGroupById($id);
        if($userGroup)
        {
            return $userGroup;
        }
        else
        {
            $this->setError('Error Retrieving');
            return false;
        }
    }

    /**
     * get all users groups
     * @return bool
     */
    public function getAllUsersGroups()
    {
        $usersGroupRepo = new usersGroupsRepository();
        $usersGroup = $usersGroupRepo->getAllUsersGroups();
        if($usersGroup)
        {
            return $usersGroup;
        }
        else
        {
            $this->setError('Error Retrieving');
            return false;
        }
    }

}