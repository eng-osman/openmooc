<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 4/6/2018
 * Time: 3:31 AM
 */

namespace App\Http\Controllers;

use OpenMooc\Courses\Models\CoursesLessons;
use Validator;
use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesLessonService;

class coursesLessonConrollers extends Controller
{
    private $con ;
    public function __construct()
    {
        $this->con = new coursesLessonService();
    }

    public function addform(){
        return view('lesson');

    }

    public function addLesson(Request $request){

        $rules = [
            'lesson_title' => 'required|min:3|max:250',
            'lesson_course' => 'required',
            'lesson_instructor' => 'required',
            'lesson_description' => 'required',
            'lesson_video' => 'required',
        ];


        if($this->con->addLesson($request))
            return 'Lessons Added';

        return $this->con->errors();

    }

    public function upfrom(){
        return view('updatelesson');
    }

    public function updateLesson(Request $request){
        $rules = [
            'lesson_id'    =>'required',
            'lesson_title' => 'required|min:3|max:250',
            'lesson_course' => 'required',
            'lesson_instructor' => 'required',
            'lesson_description' => 'required',
            'lesson_video' => 'required',
        ];
        if($this->con->updateLesson($request))
            return 'Lessons updated';

        return $this->con->errors();

    }

    public function deleteLesson($id = 0){

        if(CoursesLessons::find($id)){
            $this->con->deleteLesson($id);
        }
        return 'not found';

    }

    public function getLessonsByCourseId(){
        $lesson = $this->con->getLessonsByCourseId();
        return $lesson ;

    }

    public function getLessonsByInstructorId(){
        $lesson = $this->con->getLessonsByInstructorId();

    }



}