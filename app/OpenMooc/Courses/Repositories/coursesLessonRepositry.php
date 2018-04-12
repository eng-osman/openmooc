<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/6/2018
 * Time: 3:22 AM
 */

namespace OpenMooc\Courses\Repositories;

use Illuminate\Support\Facades\DB;
use OpenMooc\Repository;

class coursesLessonRepositry extends Repository
{
    public function addLesson($lesson)

    {
        //get item
        $item = [
            'lesson_title' => $lesson['lesson_title'],
            'lesson_course' => $lesson['lesson_course'],
            'lesson_instructor' => $lesson['lesson_instructor'],
            'lesson_description' => $lesson['lesson_description'],
            'lesson_video' => $lesson['lesson_video']
        ];
        //insert date
        if (DB::table('courses_lessons')->insert([$item]))
            return true;
        return false;
    }


    public function updateLesson($lesson)
    {//get item
        $item = [
            'lesson_title' => $lesson['lesson_title'],
            'lesson_course' => $lesson['lesson_course'],
            'lesson_description' => $lesson['lesson_description'],
            'lesson_video' => $lesson['lesson_video']
        ];
        // update Query
        if (DB::table('courses_lessons')
            ->where('lesson_id', $lesson['lesson_id'])
            ->update($item)
        )
            return true;
        return false;

    }

    public function deleteLesson($lessonId)
    {
        $lesson = DB::table('courses_lessons')->where('lesson_id', $lessonId)->get();//get lesson match slected id

        if (count($lesson) > 0) {//check if there is lesson match this lesson_id
            // query del by id
            if (DB::table('courses_lessons')->where('lesson_id', $lessonId)->delete())
                return true;
        }
        return false;
    }


    public function getLessonsByCourseId($CourseId = 0)
    {
        $lesson = DB::table('courses_lessons')
            ->leftJoin('courses', 'courses.course_id', '=', 'courses_lessons.lesson_course')
            ->leftJoin('users', 'courses_lessons.lesson_instructor', '=', 'users.id')
            ->select('courses_lessons.lesson_id', 'courses.course_name', 'courses_lessons.lesson_title', 'courses_lessons.lesson_description', 'courses_lessons.lesson_video', 'users.name', 'users.id')
            ->where('courses_lessons.lesson_course', '=', $CourseId)
            ->get();

        return $lesson;

    }

    public function getLessonsByInstructorId($InstructorId = 0)
    {
        // user name + lesson
        //user name
        //lesson title  des
        $lesson = DB::table('courses_lessons')
            ->leftJoin('users', 'users.id', '=', 'courses_lessons.lesson_instructor')
            ->leftJoin('courses', 'courses.course_id', '=', 'courses_lessons.lesson_course')
            ->select('courses.course_name', 'users.name', 'courses_lessons.lesson_title', 'courses_lessons.lesson_description', 'users.name')
            ->where('courses_lessons.lesson_instructor', '=', $InstructorId)
            ->get();
        return $lesson;
    }


}