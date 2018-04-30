<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:06 PM
 */

namespace OpenMooc\Courses\Services;


use OpenMooc\Courses\Repositories\lessonsRepository;
use OpenMooc\Service;
use Validator;

class lessonsService extends Service
{
    public function addLesson($request)
    {
        $rules = [
            'lesson_title'        => 'required|max:100',
            'lesson_course'       => 'required|integer',
            'lesson_instructor'   => 'required|integer',
            'lesson_description'  => 'required|max:1000',
            'lesson_video'        => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $lRepository = new lessonsRepository();
        if($lRepository->addLesson($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getLessonsByCourseId($id)
    {
        $lRepository = new lessonsRepository();
        $lessons = $lRepository->getLessonsByCourseId($id);
        if($lessons){
            return $lessons;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getLessonsByInstructorId($instructorId)
    {
        $lRepository = new lessonsRepository();
        $lessons = $lRepository->getLessonsByInstructorId($instructorId);
        if($lessons){
            return $lessons;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getlesson($id)
    {
        $lRepository = new lessonsRepository();
        $lesson = $lRepository->getlesson($id);
        if($lesson){
            return $lesson;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function updateLesson($request)
    {
        $rules = [
            'lesson_title'        => 'required|max:100',
            'lesson_course'       => 'required|integer',
            'lesson_instructor'   => 'required|integer',
            'lesson_description'  => 'required|max:1000',
            'lesson_video'        => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $lRepository = new lessonsRepository();
        if($lRepository->updateLesson($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function deleteLesson($id)
    {
        $lRepository = new lessonsRepository();
        if($lRepository->deleteLesson($id)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

}