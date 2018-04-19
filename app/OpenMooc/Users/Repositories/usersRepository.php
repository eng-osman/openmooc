<?php
namespace OpenMooc\Users\Repositories;

use OpenMooc\Repository;
use Illuminate\Support\Facades\Request;
use OpenMooc\Courses\Repositories\coursesCategoriesRepositry;
use Illuminate\Support\Facades\DB;
use OpenMooc\Service;
use OpenMooc\Users\Models\Users;
use OpenMooc\Users\Models\usersModel;
use Validator;

class usersRepository extends Repository
{
    public function addUser($userData)
    {
        $users = new Users();
        $users->username = $userData['username'];
        $users->name = $userData['name'];
        $users->email = $userData['email'];
        $users->password = $userData['password'];
        $users->user_group = $userData['user_group'];
        $users->about = ($userData['about'])? $userData['about']:null;
        $users->is_active = $userData['active'];
        if ($users->save())
            return true;

        return false;
    }

    public function updateUser($userData)
    {
        $item = [
            'username' => $userData['username'],
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => $userData['password'],
            'user_group' => $userData['user_group'],
            'about' => $userData['about'],
            'is_active' => $userData['active']
        ];
        // update Query
        if (DB::table('users')
            ->where('users.id', $userData['id'])
            ->update($item)
        )
            return true;
        return false;
    }

    public function updateUserPassword($userData)
    {
        $item = [
            'password' => $userData['password']
        ];
        // update Query
        if (DB::table('users')
            ->where('users.id', $userData['id'])
            ->update($item)
        )
            return true;
        return false;
    }

    public function deleteUser($id)
    {
        $user = DB::table('users')
            ->where('users.id', '=', $id)
            ->get();

        if ($user) {
            DB::table('users')->delete()->where('users.id', '=', $id);
            return true;
        }
        return false;

    }

    public function getUsers()
    {
        $users = DB::table('users')
            ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.username', 'users.name', 'users.email', 'users.about', 'users.is_active', 'users_groups.group_name')
            ->get();
        return $users;

    }

    public function getUser($id)
    {
        $user = DB::table('users')
            ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.username', 'users.name', 'users.email', 'users.about', 'users.is_active', 'users_groups.group_name')
            ->where('users.id', '=', $id)
            ->get();

        return $user;

    }

    public function getUsersByGroup($group_id= [])
    {
        $users = Users::all()->whereIn('user_group', $group_id);
        return $users;
    }


    public function getUsersByActiveStatus($status = 1)
    {
        $users = DB::table('users')
            ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.username', 'users.name', 'users.email', 'users.about', 'users.is_active', 'users_groups.group_name')
            ->where('users.is_active', '=', $status)
            ->get();

        return $users;
    }


    public function searchUsers($keyword)
    {
        $users = DB::table('users')
            ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->select('users.username', 'users.name', 'users.email', 'users.about', 'users.is_active', 'users_groups.group_name')
            ->where('users.is_active', 'like', "%$keyword%")
            ->orWhere('users.username', 'like', "%$keyword%")
            ->orWhere('users.email', 'like', "%$keyword%")
            ->get();

        return $users;
    }

}