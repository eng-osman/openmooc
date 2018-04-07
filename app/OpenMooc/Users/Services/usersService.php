<?php

namespace OpenMooc\Users\Services;

use Validator;
use OpenMooc\Service;
use OpenMooc\Users\Repositories\usersRepository;

class usersService extends Service
{
    private $usersRepository;

    public function __construct()
    {
        $this->usersRepository = new usersRepository();
    }

    public function addUser($request)
    {
        $rules = [
            'username' => 'required|min:3|max:250',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|max:250',
            'user_group' => 'required',
            'active' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store


        if ($this->usersRepository->addUser($request->all()))
            return true;

        $this->setError('Error Saving to database in table users');
        return false;
    }

    public function updateUser($request)
    {
        $rules = [
            'username' => 'required|min:3|max:250',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|max:250',
            'user_group' => 'required',
            'active' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->usersRepository->updateUser($request->all()))
            return true;

        $this->setError('Error update to database in table users');
        return false;
    }

    public function updateUserPassword($request)
    {
        $rules = [
            'password' => 'required|min:3|max:250'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->usersRepository->updateUserPassword($request->all()))
            return true;

        $this->setError('Error update password to database in table users');
        return false;
    }

    public function deleteUser($id)
    {
        if ($this->usersRepository->deleteUser($id)) {
            return true;

        }

        $this->setError('Error deleteing from users table in database');
        return false;
    }

    public function getUsers()
    {
        return $this->usersRepository->getUsers();
    }

    public function getUser($id = 0)
    {
        return $this->usersRepository->getUser($id);
    }

    public function getUsersByGroup($group_id)
    {
        return $this->usersRepository->getUsersByGroup($group_id);
    }

    public function getUsersByActiveStatus($status = 1)
    {
        return $this->usersRepository->getUsersByActiveStatus($status);
    }

    public function searchUsers($keyword)
    {
        return $this->usersRepository->searchUsers($keyword);
    }

}