<?php
namespace OpenMooc\Courses\Repositories;

use OpenMooc\Courses\Models\CoursesLessons;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class lessonsRepository extends Repository
{
    // add lesson
    public function addLesson($lessonData)
    {
        $lessons = new CoursesLessons();
        $lessons->lesson_title       = $lessonData['lesson_title'];
        $lessons->lesson_course      = $lessonData['lesson_course'];
        $lessons->lesson_instructor  = $lessonData['lesson_instructor'];
        $lessons->lesson_description = $lessonData['lesson_description'];
        $lessons->lesson_video       = $lessonData['lesson_video'];
        if($lessons->save()){
            return true;
        }else{
            return false;
        }
    }

    // get lessons By course Id
    public function getLessonsByCourseId($id)
    {
        $lessons = DB::table('courses_lessons')
            ->leftJoin('courses', 'courses_lessons.lesson_course', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_lessons.lesson_instructor', '=', 'users.id')
            ->select('courses_lessons.*','courses.course_name','users.name')
            ->where('lesson_course','=',$id)
            ->get();
        if(count($lessons)>0)
           return $lessons;
    }

    // get lessons by Instructor
    public function getLessonsByInstructorId($instructorId)
    {
        $lessons = DB::table('courses_lessons')
            ->leftJoin('courses', 'courses_lessons.lesson_course', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_lessons.lesson_instructor', '=', 'users.id')
            ->select('courses_lessons.*','courses.course_name','users.name')
            ->where('lesson_instructor','=',$instructorId)
            ->get();
        if(count($lessons)>0)
           return $lessons;
    }

    // get lesson By Id
    public function getlesson($id)
    {
        return CoursesLessons::find($id);
    }

    //update lesson
    public function updateLesson($Data)
    {
        $lesson = CoursesLessons::find($Data['lesson_id']);
        $lesson->lesson_title        = $Data['lesson_title'];
        $lesson->lesson_course       = $Data['lesson_course'];
        $lesson->lesson_instructor   = $Data['lesson_instructor'];
        $lesson->lesson_description  = $Data['lesson_description'];
        $lesson->lesson_video        = $Data['lesson_video'];
        if($lesson->save()){
            return true;
        }else{
            return false;
        }
    }

    // delete lesson
    public function deleteLesson($id)
    {
        $lesson = CoursesLessons::find($id);
        if(!$lesson){
            return 'lesson not found';
        }else{
            $lesson->delete();
            return true;
        }
    }

}