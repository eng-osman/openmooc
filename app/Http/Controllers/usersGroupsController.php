<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/3/2018
 * Time: 9:56 PM
 */

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OpenMooc\Users\Services\userGroupsService;

class usersGroupsController extends Controller
{
    public function addUserGroup()
    {
        return view('usergroup');
    }

    public function processaddUserGroup(Request $request)
    {
        $ugService = new userGroupsService();
        if($ugService->addUserGroup($request)){
            return 'User Group Added';
        }else{
            return $ugService->errors();
        }
    }

    public function getAllGroups()
    {
        $ugService = new userGroupsService();
        $groups = $ugService->getAllGroups();
        return view('groups')->with('groups',$groups);
    }

    public function getGroupById($id)
    {
        $ugService = new userGroupsService();
        $usergroup = $ugService->getGroupById($id);
        return view('group')->with('group',$usergroup);
    }

    public function updateUserGroup($id)
    {
        $ugService = new userGroupsService();
        $usergroup = $ugService->getGroupById($id);
        return view('updategroup')->with('group',$usergroup);
    }

    public function processupdateUserGroup(Request $request)
    {
        $ugService = new userGroupsService();
        if($ugService->updateUserGroup($request)){
            return 'User Group Updated';
        }else{
            return $ugService->errors();
        }
    }

    public function deleteUserGroup($id)
    {
        $ugService = new userGroupsService();
        if($ugService->deleteUserGroup($id)){
            return 'User Group deleted';
        }else{
            return $ugService->errors();
        }
    }
}