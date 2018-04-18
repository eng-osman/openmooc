<?php

namespace OpenMooc\Courses\Services;
use OpenMooc\Courses\Repositories\coursesLessonsRepositories;
use OpenMooc\Service;
use Validator;

class coursesLessonsServices extends  Service
{


    // add lessons
    public function addLesson($request)
    {
        $rules = [
            'lesson_title'        => 'required|min:5|max:150',
            'lesson_course'       => 'required|integer',
            'lesson_instructor'   => 'required|integer',
            'lesson_description'  => 'required|min:50|max:1000',
            'lesson_video'        => 'required'
        ];
        //validation
        $validator = Validator::make($request->all(),$rules);
        //check
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        //use repo
        $lessonRepo = new coursesLessonsRepositories();
        if($lessonRepo->addLesson($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Adding');
            return false;
        }
    }

    // update lesson by id
    public function updateLesson($request)
    {
        $rules = [
            'lesson_title'        => 'required|min:5|max:150',
            'lesson_course'       => 'required|integer',
            'lesson_instructor'   => 'required|integer',
            'lesson_description'  => 'required|min:50|max:1000',
            'lesson_video'        => 'required'
        ];

        //validation
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $lessonRepo = new coursesLessonsRepositories();
        if($lessonRepo->updateLesson($request->all())){
            return true;
        }
        else
        {
            $this->setError('Error Updating');
            return false;
        }
    }

    // delete lession bu id
    public function deleteLessonById($id)
    {
        $lessonRepo = new coursesLessonsRepositories();
        if($lessonRepo->deleteLessonById($id))
        {
            return true;
        }
        else
        {
            $this->setError('Error Deleting');
            return false;
        }
    }

    // get lesson by id
    public function getLessonById($id)
    {
        $lessonRepo = new coursesLessonsRepositories();
        $lesson = $lessonRepo->getLessonById($id);
        if($lesson)
        {
            return $lesson;
        }
        else
        {
            $this->setError('Error Retrieving Ddata');
            return false;
        }
    }

    // get lesson by course id
    public function getLessonsByCourseId($id)
    {
        $lessonRepo = new coursesLessonsRepositories();
        $lesson     = $lessonRepo->getLessonsByCourseId($id);
        if($lesson)
        {
            return $lesson;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

    // get lessons by Instructor
    public function getLessonsByInstructorId($id)
    {
        $lRepository = new coursesLessonsRepositories();
        $lessons = $lRepository->getLessonsByInstructorId($id);
        if($lessons)
        {
            return $lessons;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

}