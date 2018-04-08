<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use OpenMooc\Users\Services\userGroupsService;

class adminUsersGroupsController extends Controller
{
    // show all users group
    public function index()
    {
        $ugService = new userGroupsService();
        $groups = $ugService->getAllGroups();
        return view('dashboard.admin.groups')->with('groups',$groups);
    }

    // show add user group form
    public function create()
    {
        return view('dashboard.admin.addgroup');
    }

    // add new user group to database
    public function store(Request $request)
    {
        $ugService = new userGroupsService();
        if($ugService->addUserGroup($request)){
            return 'User Group Added';
        }else{
            return $ugService->errors();
        }
    }

    // show user group by id
    public function show($id)
    {
        $ugService = new userGroupsService();
        $usergroup = $ugService->getGroupById($id);
        return view('dashboard.admin.group')->with('group',$usergroup);
    }

    // show update form
    public function edit($id)
    {
        $ugService = new userGroupsService();
        $usergroup = $ugService->getGroupById($id);
        return view('dashboard.admin.updategroup')->with('group',$usergroup);
    }

    // update user group in database
    public function update(Request $request)
    {
        $ugService = new userGroupsService();
        if($ugService->updateUserGroup($request)){
            return 'User Group Updated';
        }else{
            return $ugService->errors();
        }
    }

    // delete user group from database
    public function destroy($id)
    {
        $ugService = new userGroupsService();
        if($ugService->deleteUserGroup($id)){
            return 'User Group deleted';
        }else{
            return $ugService->errors();
        }
    }
}
