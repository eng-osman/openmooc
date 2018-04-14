<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/6/2018
 * Time: 4:34 AM
 */

namespace App\Http\Controllers;


use OpenMooc\Users\Services\usersGroupSevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersGroupController extends Controller
{
    private $usersGroupService;

    public function __construct()
    {
        $this->usersGroupService = new usersGroupSevice();
    }

    public function addUserGroup()
    {
        return view('adduserGroup');

    }

    public function processAddUserGroup(Request $request)
    {
        if ($this->usersGroupService->addUserGroup($request))
            return 'user group Added';

        return $this->usersGroupService->errors();
    }

    public function processupdateUserGroup(Request $request)
    {
        if ($this->usersGroupService->updateUserGroup($request))
            return 'user group updated';

        return $this->usersGroupService->errors();
    }

    public function updateuserGroup($id = 0)
    {
        $userGroup = DB::table('users_groups')
            ->where('users_groups.group_id', '=', $id)
            ->get();
        if (count($userGroup) > 0) {

            return view('updateuserGroup')
                ->with('userGroups', $userGroup);
        }
        return 'there no user group match this id';
    }

    public function deleteUserGroup($id = 0)
    {
        if ($this->usersGroupService->deleteUserGroup($id))
            return 'User Group deleted';
        return $this->usersGroupService->errors();
    }

    public function getAllGroups()
    {
        $userGroups = $this->usersGroupService->getAllGroups();

        return view('usergroups')
            ->with('userGroupsList', $userGroups);
    }

    public function getGroupById($id = 0)
    {
        $usersGroup = $this->usersGroupService->getGroupById($id);
        if (count($usersGroup) > 0) {
            return view('usergroups')
                ->with('userGroupsList', $usersGroup);
        } else {
            return 'there is no users Group match this id';
        }
    }
}