<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Services\lessonsService;

class adminLessonsController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    // show lessons By course
    public function show($id)
    {
        $lService = new lessonsService();
        $lessons = $lService->getLessonsByCourseId($id);
        return view('dashboard.admin.lessons')->with('lessons',$lessons);
    }

    // show update form
    public function edit($id)
    {
        $lService = new lessonsService();
        $lesson = $lService->getlesson($id);
        return view('dashboard.admin.updatelesson')->with('lesson',$lesson);
    }

    // update lesson in database
    public function update(Request $request)
    {
        $lService = new lessonsService();
        if($lService->updateLesson($request)){
            return 'lesson Updated';
        }else{
            return $lService->errors();
        }
    }

    // delete lesson from database
    public function destroy($id)
    {
        $lService = new lessonsService();
        if($lService->deleteLesson($id)){
            return 'Lesson deleted';
        }else{
            return $lService->errors();
        }
    }

    public function getLessonsByInstructorId($id)
    {
        $lService = new lessonsService();
        $lessons = $lService->getLessonsByInstructorId($id);
        return view('lessonsIns')->with('lessons',$lessons);
    }

}
