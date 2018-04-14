<?php

namespace App\Http\Controllers;

use OpenMooc\Users\Services\usersService;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{

    private $usersService;

    public function __construct()
    {
        $this->usersService = new usersService();
    }

    public function addUser()
    {
        $userGroups = DB::table('users_groups')->get();
        return view('adduser')
            ->with('userGroups', $userGroups);
    }

    public function processAddUser(Request $request)
    {
        if ($this->usersService->addUser($request))
            return 'user Added';

        return $this->usersService->errors();
    }

    public function deleteUser($id = 0)
    {

        if ($this->usersService->deleteUser($id))
            return 'user deleted';
        return $this->usersService->errors();
    }

    public function getUsers()
    {
        $users = $this->usersService->getUsers();

        return view('users')
            ->with('usersList', $users);
    }

    public function getUser($id = 0)
    {
        $user = $this->usersService->getUser($id);
        if (count($user) > 0) {
            return view('users')
                ->with('usersList', $user);
        } else {
            return 'there is no user match this id';
        }
    }

    public function getUsersByGroup($group_id)
    {
        $users = $this->usersService->getUsersByGroup($group_id);
        if (count($users) > 0) {
            return view('users')
                ->with('usersList', $users);
        } else {
            return 'there is no user match this group id';
        }
    }

    public function getUsersByActiveStatus($status = 1)
    {
        $users = $this->usersService->getUsersByActiveStatus($status);
        if (count($users) > 0) {
            return view('users')
                ->with('usersList', $users);
        } else {
            return 'there is no user match this status';
        }
    }

    public function searchUsers($keyword)
    {
        $users = $this->usersService->searchUsers($keyword);
        if (count($users) > 0) {
            return view('users')
                ->with('usersList', $users);
        } else {
            return 'there is no user match this key';
        }
    }

    public function updateUser($id = 0)
    {
        $users = DB::table('users')
            ->where('users.id', '=', $id)
            ->get();
        if (count($users) > 0) {

            $userGroups = DB::table('users_groups')->get();
            return view('updateusers')
                ->with('usersgroups', $userGroups)
                ->with('users', $users);
        }
        return 'there no user match this id';
    }

    public function processupdateuser(Request $request)
    {
        if ($this->usersService->updateUser($request))
            return 'user updated';

        return $this->usersService->errors();
    }

    public function updateUserPassword($id = 0)
    {
        {
            $user = DB::table('users')
                ->where('users.id', '=', $id)
                ->get();
            if (count($user) > 0) {


                return view('updateuserspassword')
                    ->with('user', $user);

            }
            return 'there no course lesson match this id';
        }
    }

    public function processupdateUserPassword(Request $request)
    {
        if ($this->usersService->updateUserPassword($request))
            return 'user updated';

        return $this->usersService->errors();

    }

}