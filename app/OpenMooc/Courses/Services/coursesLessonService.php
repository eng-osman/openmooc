<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/4/2018
 * Time: 7:21 PM
 */

namespace OpenMooc\Courses\Services;


use Illuminate\Http\Request;
use OpenMooc\Courses\Repositories\coursesCategoriesRepositry;

use OpenMooc\Courses\Repositories\coursesLessonRepositry;
use OpenMooc\Service;
use Validator;

class coursesLessonService extends Service
{private $coursesLessonRepo;
    public function __construct(){
    $this->coursesLessonRepo= new coursesLessonRepositry();
}
    public function addLesson($request)
    {
        $rules = [
            'lesson_title' => 'required|min:3|max:250',
            'lesson_course' => 'required',
            'lesson_instructor' => 'required',
            'lesson_description' => 'required',
            'lesson_video' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store
        if ($this->coursesLessonRepo->addLesson($request->all()))
            return true;

        $this->setError('Error Saving to database in courses lessons');
        return false;
    }

    public function updateLesson(Request $req)
    {
        $rules = [
            'lesson_title' => 'required|min:3|max:250',
            'lesson_course' => 'required',
            'lesson_course' => 'required',
            'lesson_description' => 'required',
            'lesson_video' => 'required',
        ];
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->coursesLessonRepo->updateLesson($req->all()))
            return true;

        $this->setError('Error updating to database in courses lesson');
        return false;
    }

    public function deleteLesson($id = 0)
    {
        if ($this->coursesLessonRepo->deleteLesson($id)) {
            return true;
        }
        $this->setError('Error deleteing from courses lessons database');
        return false;
    }

    public function getLessonsByCourseId($course_id)
    {
        return $this->coursesLessonRepo->getLessonsByCourseId($course_id);
    }

    public function getLessonsByInstructorId($id)
    {
        return $this->coursesLessonRepo->getLessonsByInstructorId($id);
    }


}