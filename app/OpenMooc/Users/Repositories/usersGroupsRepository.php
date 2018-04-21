<?php

namespace OpenMooc\Users\Repositories;


use OpenMooc\Repository;
use OpenMooc\Users\Models\UsersGroups;

class usersGroupsRepository extends Repository
{
    // Add group
    public function addUserGroup($groupData)
    {
        $usergroups = new UsersGroups();
        $usergroups->group_name = $groupData['group_name'];
        if($usergroups->save()){
            return true;
        }else{
            return false;
        }
    }

    // get all users group
    public function getAllGroups()
    {
        return UsersGroups::all();
    }

    // get user group By ID
    public function getGroupById($id)
    {
        return UsersGroups::find($id);
    }

    // update user group
    public function updateUserGroup($data)
    {
        $usergroups = UsersGroups::find($data['group_id']);
        $usergroups->group_name = $data['group_name'];
        if($usergroups->save()){
            return true;
        }else{
            return false;
        }
    }

    // delete user group
    public function deleteUserGroup($id)
    {
        $usergroup = UsersGroups::find($id);
        if(!$usergroup){
            return 'user group not found';
        }else{
            $usergroup->delete();
            return true;
        }
    }

}