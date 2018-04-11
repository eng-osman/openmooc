<?php

namespace OpenMooc\Users\Services;

use OpenMooc\Service;
use OpenMooc\Users\Repositories\usersRepository;
use Validator;

class usersService extends Service
{

    /**
     * add user
     * @param $request
     * @return bool
     */
    public function addUser($request)
    {
        $rules = [
            'username'       => 'required|unique:users|min:5|max:50',
            'name'           => 'required|min:3|max:20',
            'image'          => 'required|unique:users',
            'email'          => 'required|unique:users|email',
            'password'       => 'required|min:6|max:100',
            'user_group'     => 'required|integer',
            'about'          => 'required|max:1000',
            'is_active'      => 'required|boolean',
            '_token'         => 'required'
        ];
        //validation
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $userRepo = new usersRepository();
        if($userRepo->addUser($request->all())){
            return true;
        }
        else
        {
            $this->setError('Error Adding');
            return false;
        }
    }

    /**update user by id
     * @param $request
     * @return bool
     */
    public function updateUser($request)
    {
        $rules = [
            'username'       => 'required|unique:users|min:5|max:50',
            'name'           => 'required|min:3|max:20',
            'image'          => 'required|unique:users',
            'email'          => 'required|unique:users|email',
            'password'       => 'required|min:6|max:100',
            'user_group'     => 'required|integer',
            'about'          => 'required|max:1000',
            'is_active'      => 'required|boolean',
            '_token'         => 'required'
        ];
        //validation
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $userRepo = new usersRepository();
        if($userRepo->updateUser($request->all())){
            return true;
        }
        else
        {
            $this->setError('Error Updating');
            return false;
        }
    }

    /**
     * update user password by id
     * @param $request
     * @return bool
     */
    public function updateUserPassword($request)
    {
        $rules = [
            'password'  => 'required|min:6|max:100'
        ];
        //validation
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $userRepo = new usersRepository();
        if($userRepo->updateUserPassword($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Updating');
            return false;
        }
    }

    /**
     * delete user by id
     * @param $id
     * @return bool
     */
    public function deleteUserById($id)
    {
        $userRepo = new usersRepository();
        if($userRepo->deleteUserById($id))
        {
            return true;
        }
        else
        {
            $this->setError('Error Deleting');
            return false;
        }
    }

    /**
     * get all users
     * @return bool|mixed
     */
    public function getAllUsers()
    {
        $usersRepo = new usersRepository();
        $users    = $usersRepo->getAllUsers();
        if($users)
        {
            return $users;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

    /**
     * get user by id
     * @param $id
     * @return bool
     */
    public function getUserById($id)
    {
        $usersRepo = new usersRepository();
        $user      = $usersRepo->getUserById($id);
        if($user)
        {
            return $user;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

    /**
     * get user by group
     * @param $id
     * @return bool|mixed
     */
    public function getUsersByGroup($id)
    {
        $usersRepo    = new usersRepository();
        $user         = $usersRepo->getUsersByGroup($id);
        if($user)
        {
            return $user;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

    /**
     * get users by active
     * @param $activation
     * @return bool|mixed
     */
    public function getUsersByActiveStatus($activation)
    {
        $usersRepo = new usersRepository();
        $user = $usersRepo->getUsersByActiveStatus($activation);
        if($user)
        {
            return $user;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function updateUserByActiveStatus($id)
    {
        $uRepository = new usersRepository();
        $user = $uRepository->updateUserByActiveStatus($id);
        if($user)
        {
            return $user;
        }
        else
        {
            $this->setError('Error Updating');
            return false;
        }
    }

    /**
     * @param $keyword
     * @return bool
     */
    public function searchUsersByNameOrEmail($keyword)
    {
        $uRepository = new usersRepository();
        $users = $uRepository->searchUsersByNameOrEmail($keyword);
        if($users)
        {
            return $users;
        }
        else
        {
            $this->setError('Error Search');
            return false;
        }
    }
}