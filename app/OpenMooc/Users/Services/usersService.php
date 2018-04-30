<?php

namespace OpenMooc\Users\Services;

use OpenMooc\Service;
use OpenMooc\Users\Repositories\usersRepository;
use Validator;

class usersService extends Service
{
    public function addUser($userData)
    {
        $rules = [
            'name'           => 'required|unique:users|min:3|max:20',
            'username'       => 'required|unique:users|min:5|max:20',
            'password'       => 'required|min:6|max:20',
            'email'          => 'required|unique:users|email',
            'image'          => 'image',
            'about'          => 'max:500',
            'user_group'     => 'integer'
        ];

        $validator = Validator::make($userData, $rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return redirect()
                ->back()
                 ->withInput();
        }

        $uRepository = new usersRepository();
        if($uRepository->addUser($userData)){
            return true;
        }
    }

    public function getUsers()
    {
        $uRepository = new usersRepository();
        $users = $uRepository->getUsers();
        if($users){
            return $users;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getUser($id)
    {
        $uRepository = new usersRepository();
        $user = $uRepository->getUser($id);
        if($user){
            return $user;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getUsersByGroup($id)
    {
        $uRepository = new usersRepository();
        $user = $uRepository->getUsersByGroup($id);
        if($user){
            return $user;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getUsersByActiveStatus($status)
    {
        $uRepository = new usersRepository();
        $user = $uRepository->getUsersByActiveStatus($status);
        if($user){
            return $user;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function activeUser($id)
    {
        $uRepository = new usersRepository();
        $user = $uRepository->activeUser($id);
        if($user){
            return $user;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function deActivateUser($id)
    {
        $uRepository = new usersRepository();
        $user = $uRepository->deActivateUser($id);
        if($user){
            return $user;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function updateUser($request)
    {
        $rules = [
            'name'           => 'required|min:3|max:20',
            'username'       => 'required|min:5|max:20',
            'password'       => 'required|min:6|max:20',
            'email'          => 'required|email',
            'image'          => 'required|image',
            'about'          => 'required|max:500',
            'user_group'     => 'required|integer',
            'is_active'      => 'required|boolean',
            'remember_token' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $uRepository = new usersRepository();
        if($uRepository->updateUser($request->all())){
            return true;
        }
    }


    public function updateUserPassword($request)
    {
        $rules = [
            'password' => 'required|min:6|max:20'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $uRepository = new usersRepository();
        if($uRepository->updateUserPassword($request->all())){
            return true;
        }
    }


    public function deleteUser($id)
    {
        $uRepository = new usersRepository();
        if($uRepository->deleteUser($id)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function searchUsers($keyword)
    {
        $uRepository = new usersRepository();
        $users = $uRepository->searchUsers($keyword);
        if($users){
            return $users;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function usersnum()
    {
        $uRepository = new usersRepository();
        $num = $uRepository->usersnum();
        if($num){
            return $num;
        }else{
            $this->setError('Error');
            return false;
        }
    }

}