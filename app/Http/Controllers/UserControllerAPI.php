<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/18/2018
 * Time: 10:49 AM
 */

namespace App\Http\Controllers;


use OpenMooc\Users\Services\usersService;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserControllerAPI extends Controller
{
    private $usersService;

    public function __construct()
    {
        $this->usersService = new usersService();
    }

    public function addUser()
    {
        $userGroups = DB::table('users_groups')->select('users_groups.group_name')->get();
        $responseData['status'] = ($userGroups) ? true : false;
        $responseData['message'] = ($userGroups) ? 'users_groups details' : 'no users_groups!';
        $responseData['users_groups'] = ($userGroups) ? $userGroups : null;

        return response()->json($responseData);
    }

    public function processAddUser(Request $request)
    {
        if ($this->usersService->addUser($request->json()->all()))
            return response()->json(['status' => true, 'message' => 'user Added']);
        return response()->json(['status' => false, 'message' => 'user not Added', 'error' => $this->usersService->errors()]);

    }

    public function deleteUser(Request $request)
    {
        $data = $request->json()->all();
        $id = $data['id'];

        if ($this->usersService->deleteUser($id))
            return response()->json(['status' => true, 'message' => 'user deleted']);
        return response()->json(['status' => false, 'message' => 'user not deleted', 'error' => $this->usersService->errors()]);

    }

    public function getUsers()
    {
        $users = $this->usersService->getUsers();
        $responseData['status'] = ($users) ? true : false;
        $responseData['message'] = ($users) ? 'users details' : 'there is no users';
        $responseData['all users'] = $users;
        $statusCode = ($users) ? 200 : 404;
        return response()->json($responseData, $statusCode);
    }

    public function getUser(Request $request)
    {
        $data = $request->json()->all();
        $id = $data['id'];
        $user = $this->usersService->getUser($id);
        $responseData['status'] = ($user) ? true : false;
        $responseData['message'] = ($user) ? 'users details' : 'there is no users';
        $responseData['all users'] = $user;
        $statusCode = ($user) ? 200 : 404;
        return response()->json($responseData, $statusCode);
    }

    public function getUsersByGroup(Request $request)
    {
        $data = $request->json()->all();
        $group_id = $data['group_id'];
        $users = $this->usersService->getUsersByGroup($group_id);
        $responseData['status'] = ($users) ? true : false;
        $responseData['message'] = ($users) ? 'users details' : 'there is no users';
        $responseData['all users'] = $users;
        $statusCode = ($users) ? 200 : 404;
        return response()->json($responseData, $statusCode);
    }

    public function getUsersByActiveStatus(Request $request)
    {
        $data = $request->json()->all();
        $status = $data['status'];
        $users = $this->usersService->getUsersByActiveStatus($status);
        $responseData['status'] = ($users) ? true : false;
        $responseData['message'] = ($users) ? 'users details' : 'there is no users';
        $responseData['all users'] = $users;
        $statusCode = ($users) ? 200 : 404;
        return response()->json($responseData, $statusCode);
    }

    public function searchUsers(Request $request)
    {
        $data = $request->json()->all();
        $keyword = $data['keyword'];
        $users = $this->usersService->searchUsers($keyword);
        $responseData = [];
        $responseData['status'] = ($users) ? true : false;
        $responseData['message'] = ($users) ? 'users details' : 'there is no users';
        $responseData['all users'] = $users;
        $statusCode = ($users) ? 200 : 404;
        return response()->json($responseData, $statusCode);
    }

    public function updateUser(Request $request)
    {
        $data = $request->json()->all();
        $id = $data['id'];
        $responseData = [];
        $users = DB::table('users')
            ->where('users.id', '=', $id)
            ->get();
        $userGroups = ($users) ? DB::table('users_groups')->select('users_groups.group_name')->get() : null;
        $responseData['status'] = ($users) ? true : false;
        $responseData['message'] = ($users) ? 'help update data' : 'there is no data';
        $responseData['users'] = $users;
        $responseData['userGroups'] = $userGroups;
        return response()->json($responseData);
    }

    public function processupdateuser(Request $request)
    {
        if ($this->usersService->updateUser($request->json()->all()))
            return response()->json(['status' => true, 'message' => 'user updated']);
        return response()->json(['status' => false, 'message' => 'user not updated', 'error' => $this->usersService->errors()]);

    }

    public function updateUserPassword(Request $request)
    {
        $data = $request->json()->all();
        $id = $data['id'];
        $user = DB::table('users')
            ->where('users.id', '=', $id)
            ->select('users.password')
            ->get();
        $responseData['status'] = ($user) ? true : false;
        $responseData['message'] = ($user) ? 'help update data' : 'there is no data';
        $responseData['users'] = $user;

        return response()->json($responseData);
    }

    public function processupdateUserPassword(Request $request)
    {
        if ($this->usersService->updateUserPassword($request->json()->all()))
            return response()->json(['status' => true, 'message' => 'user password updated']);
        return response()->json(['status' => false, 'message' => 'user password not updated', 'error' => $this->usersService->errors()]);

    }
}