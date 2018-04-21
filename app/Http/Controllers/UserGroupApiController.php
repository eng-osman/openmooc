<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Users\Services\usersGroupSevice;

class UserGroupApiController extends Controller
{
    private $userGroupService;
    public function __construct()
    {
        $this->userGroupService = new usersGroupSevice();
    }

    public function index()
    {
        $groups = $this->userGroupService->getAllGroups();

        $responseData['status'] = (count($groups) > 0) ? true : false;
        $responseData['message'] = (count($groups) > 0) ? 'success':'Users groups not found';
        $responseData['data'] = (count($groups) > 0) ? $groups : false;
        $statusCode=  (count($groups) > 0) ? 200 : 404;

        return response()->json($responseData, $statusCode);
    }

    public function view($id)
    {
        $group = $this->userGroupService->getGroupById($id);

        $response['status'] = (count($group) > 0) ? true: false;
        $response['message'] = (count($group) > 0) ? 'success': 'User group not found';
        $response['data'] = (count($group) > 0) ? $group: false;
        $statusCode = (count($group) > 0) ? 200 : 404;

        return response()->json($response, $statusCode);
    }

    public function add(Request $request)
    {
        $data =  $request->json()->all();

        $groupData = $this->userGroupService->addUserGroup($data);

        if($groupData):
            $responseData['status'] = true;
            $responseData['message'] = 'user group added successfully';
            $statusCode = 200;
            return response()->json($responseData,$statusCode);

        else:
            $responseData['status'] = false;
            $responseData['message'] = 'Failed to insert data';
            $responseData['errors'] = $this->userGroupService->errors();
            $statusCode = 404;
            return response()->json($responseData, $statusCode);
        endif;
    }

    public function update(Request $request, $id)
    {
        $data = $request->json()->all();

        $groupData = $this->userGroupService->updateUserGroup($data, $id);

        if($groupData):
            $responseData['status'] = true;
            $responseData['message'] = 'user group updated successfully';
            $responseData['error'] = false;
            $statusCode = 200;
            return response()->json($responseData,$statusCode);

        else:
            $responseData['status'] = false;
            $responseData['message'] = 'Failed to update data';
            $responseData['errors'] = $this->userGroupService->errors();
            $statusCode = 404;
            return response()->json($responseData, $statusCode);
        endif;
    }

    public function delete($id)
    {
        $deleteUserGroup = $this->userGroupService->deleteUserGroup($id);
        if ($deleteUserGroup)
        {
            $responseData['status'] = true;
            $responseData['message'] = 'User group deleted successfully';
            $responseData['error'] = false;
            $statusCode = 200;
            return response()->json($responseData,$statusCode);
        }

        $responseData['status'] = false;
        $responseData['message'] = 'Failed to delete';
        $responseData['error'] = $this->userGroupService->errors();
        $statusCode = 404;
        return response()->json($responseData,$statusCode);


    }
}