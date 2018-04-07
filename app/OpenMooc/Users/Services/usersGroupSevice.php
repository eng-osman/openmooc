<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/6/2018
 * Time: 4:26 AM
 */

namespace OpenMooc\Users\Services;

use App\OpenMooc\Users\Repositories\usersGroupRepository;
use Validator;

use OpenMooc\Service;

class usersGroupSevice extends Service
{
    private $userGroupRep;

    public function __construct()
    {
        $this->userGroupRep = new usersGroupRepository();
    }

    public function addUserGroup($request)
    {
        $rules = [
            'group_name' => 'required|min:3|max:250',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->userGroupRep->addUserGroup($request->all()))
            return true;

        $this->setError('Error Saving to database in table users groups');
        return false;
    }

    public function updateUserGroup($request)
    {
        $rules = [
            'group_name' => 'required|min:3|max:250'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->userGroupRep->updateUserGroup($request->all()))
            return true;

        $this->setError('Error update group to database in table user group');
        return false;
    }

    public function deleteUserGroup($id)
    {
        if ($this->userGroupRep->deleteUserGroup($id)) {
            return true;
        }
        $this->setError('Error deleteing from user group table in database');
        return false;
    }
    public function getAllGroups(){
        return $this->userGroupRep->getAllGroups();
    }
    public function getGroupById($id){
        return $this->userGroupRep->getGroupById($id);
    }


}