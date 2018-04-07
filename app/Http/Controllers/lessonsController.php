<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:15 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Courses\Services\lessonsService;

class lessonsController extends Controller
{
    public function addLesson()
    {
        return view('addlesson');
    }

    public function processaddLesson(Request $request)
    {
        $lService = new lessonsService();
        if($lService->addLesson($request)){
            return 'lesson Added';
        }else{
            return $lService->errors();
        }
    }

    public function getLessonsByCourseId($id)
    {
        $lService = new lessonsService();
        $lessons = $lService->getLessonsByCourseId($id);
        return view('lessons')->with('lessons',$lessons);
    }


    public function getLessonsByInstructorId($id)
    {
        $lService = new lessonsService();
        $lessons = $lService->getLessonsByInstructorId($id);
        return view('lessonsIns')->with('lessons',$lessons);
    }


    public function getlesson($id)
    {
        $lService = new lessonsService();
        $lesson = $lService->getlesson($id);
        return view('updatelesson')->with('lesson',$lesson);
    }


    public function updateLesson(Request $request)
    {
        $lService = new lessonsService();
        if($lService->updateLesson($request)){
            return 'lesson Updated';
        }else{
            return $lService->errors();
        }
    }


    public function deleteLesson($id)
    {
        $lService = new lessonsService();
        if($lService->deleteLesson($id)){
            return 'Lesson deleted';
        }else{
            return $lService->errors();
        }
    }

}