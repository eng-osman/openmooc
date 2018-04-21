<?php
namespace App\Http\Controllers;

use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Services\categoryService;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Courses\Services\coursesStudentsService;
use OpenMooc\Users\Services\usersService;

class adminController extends Controller
{
    public function index()
    {
        //show site reports
        // users
        $uService = new usersService();
        $usernum = $uService->usersnum();
        // categories
        $cService = new categoryService();
        $categoriesnum = $cService->categoriesnum();
        //courses
        $coursesService = new coursesService();
        $coursesnum = $coursesService->coursesnum();
        // subscribes
        $sService = new coursesStudentsService();
        $subscribenum = $sService->subscribenum();

        return view('dashboard.admin.index')->with('usernum',$usernum)
                                            ->with('categoriesnum',$categoriesnum)
                                            ->with('coursesnum',$coursesnum)
                                            ->with('subscribenum',$subscribenum);
    }
}
