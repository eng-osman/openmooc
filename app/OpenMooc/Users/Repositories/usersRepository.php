<?php
namespace OpenMooc\Users\Repositories;


use OpenMooc\Repository;
use OpenMooc\Users\Models\User;
use Illuminate\Support\Facades\DB;

class usersRepository extends Repository
{
    // add user
    public function addUser($userData)
    {
        $user = new User();
        $user->username       = $userData['username'];
        $user->name           = $userData['name'];
        $user->image          = $userData['image'];
        $user->email          = $userData['email'];
        $user->password       = $userData['password'];
        $user->user_group     = $userData['user_group'];
        $user->about          = $userData['about'];
        $user->is_active      = $userData['is_active'];
        $user->remember_token = $userData['remember_token'];
        if ($user->save()) {
            return true;
        } else {
            return false;
        }
    }

    // get all users
    public function getUsers()
    {
        $users = DB::table('users')
            ->leftJoin('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.*','users_groups.group_name')
            ->get();
        return $users;
    }

    // get user by Id
    public function getUser($id)
    {
        return User::find($id);
    }

    // get users by group
    public function getUsersByGroup($id)
    {
        $users = DB::table('users')
            ->leftJoin('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.*','users_groups.group_name')
            ->where('user_group', '=', $id)
            ->get();
        return $users;
    }

    // get users by status
    public function getUsersByActiveStatus($status)
    {
        $users = DB::table('users')
            ->leftJoin('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.*','users_groups.group_name')
            ->where('is_active', '=', $status)
            ->get();
        return $users;
    }

    // update user status (is_active)
    public function activeUser($id)
    {
        $user = User::find($id);
        $user->is_active = 1;
        if ($user->save()) {
            return true ;
        } else {
            return false;
        }
    }
    public function deActivateUser($id)
    {
        $user = User::find($id);
        $user->is_active = 0;
        if ($user->save()) {
            return true ;
        } else {
            return false;
        }
    }

    // update user
    public function updateUser($data)
    {
        $user = User::find($data['id']);
        $user->username = $data['username'];
        $user->name = $data['name'];
        $user->image = $data['image'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->user_group = $data['user_group'];
        $user->about = $data['about'];
        $user->is_active = $data['is_active'];
        $user->remember_token = $data['remember_token'];
        if ($user->save()) {
            return true;
        } else {
            return false;
        }
    }

    // update password
    public function updateUserPassword($data)
    {
        $user = User::find($data['id']);
        $user->password = $data['password'];
        if ($user->save()) {
            return true;
        } else {
            return true;
        }
    }

    // delete user
    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return 'user not found';
        } else {
            $user->delete();
            return true;
        }
    }

    // search for user By username OR name OR email
    public function searchUsers($keyword)
    {
        $users = DB::table('users')
            ->leftJoin('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.*','users_groups.group_name')
            ->where('name', 'like','%' . $keyword .'%' )
            ->get();
        return $users;

    }
}