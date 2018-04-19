<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 4/5/2018
 * Time: 9:54 PM
 */

namespace App\OpenMooc\Users\Repositories;

use Illuminate\Support\Facades\DB;

use OpenMooc\Repository;
use OpenMooc\Users\Models\UsersGroups;

class usersGroupRepository extends Repository
{
    public function addUserGroup($data)
    {

        //aray
        $usergroup = [
            'group_name' => $data['group_name']
        ];

        if(DB::table('users_groups')->insert([$usergroup]))
             return true;

        return false;
    }

    public function updateUserGroup($data, $id)
    {

        $userGroup = UsersGroups::find($id);
        if($userGroup){
            $userGroup->group_name = $data['group_name'];
            return $userGroup->save();
        }
        return false;
    }

    public function deleteUserGroup($id)
    {
        // Query del by id
        $userGroup = UsersGroups::find($id);
        if($userGroup):
            $userGroup->delete();
            return true;
        endif;
        return false;
    }

    public function getAllGroups()
    {
        $item = DB::table('users_groups')->get();
        return $item;
    }

    public function getGroupById($id)
    {
        $item = DB::table('users_groups')
            ->select('users_groups.*')
            ->WHERE('group_id', $id)
            ->get();
        return $item;
    }
}