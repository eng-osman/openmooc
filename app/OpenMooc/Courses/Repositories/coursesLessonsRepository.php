<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 4/5/2018
 * Time: 11:14 PM
 */

namespace App\OpenMooc\Courses\Repositories;

use Illuminate\Support\Facades\DB;
use OpenMooc\Repository;


class coursesLessonsRepository extends Repository
{
    /*
        courses_lessons =
    lesson_id
    lesson_title
    lesson_course
    lesson_instructor
    lesson_description
    lesson_video ]
*/
    public function addLesson($lesson)

    {
        //get item
        $item = [
            'lesson_title'=>$lesson['lesson_title'],
            'lesson_course'=>$lesson['lesson_course'],
            'lesson_instructor'=>$lesson['lesson_instructor'],
            'lesson_description'=>$lesson['lesson_description'],
            'lesson_video'=>$lesson['lesson_video']
        ];
        //insert date
       $lessons = DB::table('courses_lessons')->insert([$item]);
       return $lessons ;
    }


    public function updateLesson($lesson)
    {
        $item = [
            'lesson_title'=>$lesson['lesson_title'],
            'lesson_course'=>$lesson['lesson_course'],
            'lesson_instructor'=>$lesson['lesson_instructor'],
            'lesson_description'=>$lesson['lesson_description'],
            'lesson_video'=>$lesson['lesson_video']
        ];
        // update Query
        DB::table('courses_lessons')
            ->where('lesson_id',$lesson['lesson_id'] )
            ->update($item);

    }

    public function deleteLesson($lessonId)
    {
        // query del by id
        DB::table('courses_lessons')->where('lesson_id',$lessonId)->delete();
    }


    public function getLessonsByCourseId()
    {
        // couser name + lesson
        //couers name
        //lesson title video des
        $lesson =DB::table('courses_lessons')

        ->leftJoin('courses', 'courses.course_id', '=', 'courses_lessons.lesson_course')
        ->select('courses.course_name','courses_lessons.lesson_title','courses_lessons.lesson_description','courses_lessons.lesson_video')
        ->get();

        return $lesson ;

    }

    public function getLessonsByInstructorId()
    {
        // user name + lesson
        //user name
        //lesson title  des
        $lesson =DB::table('courses_lessons')

            ->leftJoin('users', 'users.id', '=', 'courses_lessons.lesson_instructor')
            ->select('users.name','courses_lessons.lesson_title','courses_lessons.lesson_description')
            ->get();
        return $lesson ;
    }


}