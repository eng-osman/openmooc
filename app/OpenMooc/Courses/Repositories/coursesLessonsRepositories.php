<?php

namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\CoursesLessons;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;


class coursesLessonsRepositories extends  Repository
{

    // add lessons
    public function addLesson($lessonsData)
    {
        $lessons = new CoursesLessons();
        $lessons->lesson_title       = $lessonsData['lesson_title'];
        $lessons->lesson_course      = $lessonsData['lesson_course'];
        $lessons->lesson_instructor  = $lessonsData['lesson_instructor'];
        $lessons->lesson_description = $lessonsData['lesson_description'];
        $lessons->lesson_video       = $lessonsData['lesson_video'];

        //store
        if($lessons->save())
            return true;
        else
            return false;
    }

    // update lesson by id
    public function updateLesson($lessonsData)
    {
        $lesson = CoursesLessons::find($lessonsData['lesson_id']);
        $lesson->lesson_title        = $lessonsData['lesson_title'];
        $lesson->lesson_course       = $lessonsData['lesson_course'];
        $lesson->lesson_instructor   = $lessonsData['lesson_instructor'];
        $lesson->lesson_description  = $lessonsData['lesson_description'];
        $lesson->lesson_video        = $lessonsData['lesson_video'];

        //store
        if($lesson->save())
            return true;
        else
            return false;

    }

    // delete lession bu id
    public function deleteLessonById($id)
    {
        $lesson = CoursesLessons::find($id);
        if(!$lesson)
        {
            return 'this lesson is not found or deleted';
        }
        else
        {
            $lesson->delete();
            return true;
        }
    }

    // get lesson by id
    public function getLessonById($id)
    {
        return CoursesLessons::find($id);
    }

    // get lesson by course id
    public function getLessonsByCourseId($id)
    {
        $lessons = DB::table('courses_lessons')
            ->leftJoin('courses', 'courses_lessons.lesson_course', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_lessons.lesson_instructor', '=', 'users.id')
            ->where('lesson_course',$id)->select('courses_lessons.*','users.username','courses.course_name')
            ->get();
        if(count($lessons) > 0)
            return $lessons;
        else
            return false;
    }

    // get lessons by Instructor
    public function getLessonsByInstructorId($id)
    {
        $lessons = DB::table('courses_lessons')
            ->leftJoin('courses', 'courses_lessons.lesson_course', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_lessons.lesson_instructor', '=', 'users.id')
            ->where('lesson_instructor','=',$id)
            ->get();

        //check
        if(count($lessons) > 0)
            return $lessons;
    }

}