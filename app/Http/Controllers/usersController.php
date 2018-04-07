<?php

namespace App\Http\Controllers;

use OpenMooc\Users\Services\userGroupsService;
use OpenMooc\Users\Services\usersService;
use Validator;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function addUser()
    {
        $ugroup = new userGroupsService();
        $groups = $ugroup->getAllGroups();
        return view('adduser')->with('groups',$groups);
    }

    public function processaddUser(Request $request)
    {
        $userService = new usersService();
        if($userService->addUser($request)){
            return 'User Added';
        }else{
            return $userService->errors();
        }
    }

    public function getUsers()
    {
        $uService = new usersService();
        $users = $uService->getUsers();
        return view('users')->with('users',$users);
    }

    public function getUsersByGroup($id)
    {
        $uService = new usersService();
        $users = $uService->getUsersByGroup($id);
        return view('usersByGroup')->with('users',$users);
    }

    public function getUsersByActiveStatus($status)
    {
        $uService = new usersService();
        $users = $uService->getUsersByActiveStatus($status);
        return view('usersByStatus')->with('users',$users);
    }


    public function getUser($id)
    {
        $ugService = new userGroupsService();
        $groups = $ugService->getAllGroups();
        $userService = new usersService();
        $user = $userService->getUser($id);
        return view('updateuser')->with('groups',$groups)
                                 ->with('user',$user);
    }


    public function updateUser(Request $request)
    {
        $userService = new usersService();
        if($userService->updateUser($request)){
            return 'User Updated';
        }else{
            return $userService->errors();
        }
    }


    public function updateUserPassword($id)
    {
        $userService = new usersService();
        $user = $userService->getUser($id);
        return view('updatePassword')->with('user',$user);
    }


    public function processupdateUserPassword(Request $request)
    {
        $userService = new usersService();
        if($userService->updateUserPassword($request)){
            return 'Password Updated';
        }else{
            return $userService->errors();
        }
    }


    public function deleteUser($id)
    {
        $userService = new usersService();
        if($userService->deleteUser($id)){
            return 'User Deleted';
        }else{
            return $userService->errors();
        }
    }


    public function searchUsers($keyword)
    {
        $uService = new usersService();
        $users = $uService->searchUsers($keyword);
        return view('search')->with('users',$users);
    }

}