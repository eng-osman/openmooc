<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/6/2018
 * Time: 1:50 AM
 */

namespace App\Http\Controllers;


use OpenMooc\Courses\Services\coursesCategoriesService;
use OpenMooc\Courses\Services\coursesLessonService;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class coursesLessonController extends Controller
{
    private $lessonService;

    public function __construct()
    {
        $this->lessonService = new coursesLessonService();
    }

    public function addLesson()
    {
        $instructors = DB::table('users')
            ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->where('users_groups.group_name', 'like', "%instructors%")
            ->get();
        $courses = DB::table('courses')->get();
        return view('addLesson')
            ->with('instructors', $instructors)
            ->with('courses', $courses);
    }

    public function processaddLesson(Request $request)
    {
        if ($this->lessonService->addLesson($request))
            return 'course lesson Added';

        return $this->lessonService->errors();
    }

    public function updateLesson($id = 0)
    {
        $courseLesson = DB::table('courses_lessons')
            ->where('courses_lessons.lesson_id', '=', $id)
            ->get();
        if (count($courseLesson) > 0) {
            $instructors = DB::table('users')
                ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
                ->where('users_groups.group_name', 'like', "%instructors%")
                ->get();
            $courses = DB::table('courses')->get();
            return view('updatelesson')
                ->with('instructors', $instructors)
                ->with('courses', $courses)
                ->with('courseLessons', $courseLesson);
        }
        return 'there no course lesson match this id';
    }


    public function processupdateLesson(Request $request)
    {
        if ($this->lessonService->updateLesson($request))
            return 'course lesson updated';

        return $this->lessonService->errors();
    }

    public function deleteLesson($lessonId = 0)
    {
        if ($this->lessonService->deleteLesson($lessonId))
            return 'course lesson deleted';
        return $this->lessonService->errors();
    }

    public function getLessonsByCourseId($course_id = 0)
    {
        $lesson = $this->lessonService->getLessonsByCourseId($course_id);
        if (count($lesson) > 0) {
            return view('lessons')
                ->with('lessonsList', $lesson);
        } else {
            return 'there is no course lesson match this id';
        }
    }

    public function getLessonsByInstructorId($instructor_id = 0)
    {
        $lesson = $this->lessonService->getLessonsByInstructorId($instructor_id);
        if (count($lesson) > 0) {
            return view('lessons')
                ->with('lessonsList', $lesson);
        } else {
            return 'there is no course lesson match this id';
        }
    }
}