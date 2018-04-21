<?php
namespace OpenMooc\Users\Repositories;


use OpenMooc\Repository;
use OpenMooc\Users\Models\UsersGroups;

class usersGroupsRepository extends Repository{

    /**
     * add user_group
     * @param $data
     * @return bool
     */
    public function addUserGroup($data)
    {
        $userGroups = new UsersGroups();
        $userGroups->group_name = $data['group_name'];
        //store
        if($userGroups->save())
            return true;
        else
            return false;

    }

    /**
     * update user_group by id
     * @param $data
     * @return bool
     */
    public function updateUserGroup($data)
    {
        $userGroups = UsersGroups::find($data['group_id']);
        $userGroups->group_name = $data['group_name'];
        //store
        if($userGroups->save())
            return true;
        else
            return false;

    }


    /**
     * delete user_group by id
     * @param $id
     * @return bool|string
     * @throws \Exception
     */
    public function deleteUserGroup($id)
    {
        $usergroup = UsersGroups::find($id);
        if(!$usergroup)
        {
            return 'this user_group is not found or deleted';
        }
        else
        {
            $usergroup->delete();
            return true;
        }
    }

    /**
     * get user_geoup by id
     * @param $id
     */
    public function getUsersGroupById($id)
    {
        $userGroup =  UsersGroups::find($id);
        //check
        if($userGroup)
            return  $userGroup;
        else
            return false;
    }


    /**
     * get all users group
     */
    public function getAllUsersGroups()
    {
        $usersGroups =UsersGroups::all();
        if($usersGroups)
            return $usersGroups;
        else
            return false;
    }


}