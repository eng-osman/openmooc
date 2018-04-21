<?php
namespace OpenMooc\Users\Repositories;


use OpenMooc\Repository;
use OpenMooc\Users\Models\User;
use Illuminate\Support\Facades\DB;



class usersRepository extends Repository{


    /**
     * addUser
     * @param $data
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function addUser($data)
    {
        $user = new User();
        $user->username         = $data['username'];
        $user->name             = $data['name'];
        $user->image            = $data['image'];
        $user->email            = $data['email'];
        $user->password         = $data['password'];
        $user->user_group       = $data['user_group'];
        $user->about            = $data['about'];
        $user->is_active        = $data['is_active'];
        $user->remember_token   = $data['_token'];

        //store
        if ($user->save())
            return true;
        else
            return false;

    }

    /**
     * update user by id
     * @param $data
     * @return bool
     */
    public function updateUser($data)
    {
        $user                   = User::find($data['id']);
        $user->username         = $data['username'];
        $user->name             = $data['name'];
        $user->image            = $data['image'];
        $user->email            = $data['email'];
        $user->password         = $data['password'];
        $user->user_group       = $data['user_group'];
        $user->about            = $data['about'];
        $user->is_active        = $data['is_active'];
        $user->remember_token   = $data['_token'];
        //store
        if ($user->save())
            return true;
        else
            return false;

    }

    /**
     * update password user by id
     * @param $data
     * @return bool
     */
    public function updateUserPassword($data)
    {
        $user           = User::find($data['id']);
        $user->password = $data['password'];
        //store
        if ($user->save())
            return true;
        else
            return true;

    }

    /**
     * delete user by id
     * @param $id
     * @return bool|string
     * @throws \Exception
     */
    public function deleteUserById($id)
    {
        $user = User::find($id);
        if (!$user)
        {
            return 'this user is not found or deleted';
        }
        else
        {
            $user->delete();
            return true;
        }
    }

    /**
     * gel all users
     * @return mixed
     */
    public function getAllUsers()
    {
        $users = DB::table('users')
            ->leftJoin('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->get();
        if($users)
            return $users;
        else
            return false;
    }

    /**
     * get user by id
     * @param $id
     */
    public function getUserById($id)
    {
        $user = User::find($id);
        if($user)
            return true;
        else
            return false;
    }

    /**
     * get users by user group
     * @param $id
     * @return mixed
     */
    public function getUsersByGroup($id)
    {
        $users = DB::table('users')
            ->leftJoin('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->where('user_group', '=', $id)->get();
        if($users)
            return $users;
        else
            return false;
    }

    /**
     * get users by active
     * @param $activation
     * @return mixed
     */
    public function getUsersByActiveStatus($activation)
    {
        $users = DB::table('users')
            ->leftJoin('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->where('is_active', '=', $activation)->get();
        if($users)
            return $users;
        else
            return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function updateUserByActiveStatus($id)
    {
        $user            = User::find($id);
        $user->is_active = 1;
        //store
        if ($user->save())
            return true ;
        else
            return false;

    }

    /**
     * @param $keyword
     * @return mixed
     */
    public function searchUsersByNameOrEmail($keyword)
    {
        $users = DB::table('users')
            ->where('name', 'like','%' . $keyword .'%' )->orWhere('email', 'like','%' . $keyword .'%' )
            ->get();
        if($users)
            return $users;
        else
            return false;
    }
}