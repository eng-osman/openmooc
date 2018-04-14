<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/10/2018
 * Time: 1:50 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesLessonsCommentsService;
use OpenMooc\Courses\Services\coursesLessonService;

use OpenMooc\Courses\Services\coursesService;
use Validator;

use Illuminate\Support\Facades\DB;

class InstructorLessonController extends Controller
{
    private $lessonService;
    private $courseLessonCommentService;

    public function __construct()
    {
        $this->lessonService = new coursesLessonService();
        $this->courseLessonCommentService = new coursesLessonsCommentsService();
    }

//start functions of course_lessons
    public function addLesson($course_id = 0)
    {
        $lesson_instructor_id = 0;
        //get instructor_id who want to add new lesson to his course
        $lesson_instructor = DB::table('courses_lessons')
            ->select('courses_lessons.lesson_instructor')
            ->where('courses_lessons.lesson_course', '=', $course_id)
            ->get();
        foreach ($lesson_instructor as $lesson_id) {
            $lesson_instructor_id = $lesson_id->lesson_instructor;
        }
        //pass course_id and instructor_id to adding form
        return view('dashboard.instructor.addlesson')
            ->with('course_id', $course_id)
            ->with('lesson_instructor', $lesson_instructor_id);
    }

    public function processaddLesson(Request $request)
    {
        //recieve inserted data from form and add it to lesson of selected course
        if ($this->lessonService->addLesson($request))
            return view('dashboard.instructor.success')->with('message', 'course lesson Added successfully');
        return view('dashboard.instructor.error1')->with('errorMessage', $this->lessonService->errors());
    }

    public function getLessonsByCourseId($course_id = 0)
    {
        //get all lessons that match course_id in URL
        $lesson = $this->lessonService->getLessonsByCourseId($course_id);
        if (count($lesson) > 0) {//check if there is lesson match course_id
            return view('dashboard.instructor.index')
                ->with('course_id', $course_id)
                ->with('lessonsList', $lesson);
        } else {
            return view('dashboard.instructor.error')->with('errorMessage', 'there is no course lesson match this id');

        }
    }

    public function deleteLesson($lesson_id = 0)
    {
        //get lesson that match lesson_id
        $lesson = $this->lessonService->deleteLesson($lesson_id);
        if (!$lesson) {
            return view('dashboard.instructor.error1')->with('errorMessage', $this->lessonService->errors());
        }
        return view('dashboard.instructor.success')->with('message', 'course lesson Deleted successfully');

    }

    public function updateLesson($lesson_id = 0)
    {
        $instructor_id = 0;
        $courseLesson = DB::table('courses_lessons')
            ->where('courses_lessons.lesson_id', '=', $lesson_id)
            ->get();
        foreach ($courseLesson as $course) {
            $instructor_id = $course->lesson_instructor;
        }
        if (count($courseLesson) > 0) {
            $coursService = new coursesService();
            $courses = $coursService->getCoursesByInstructor($instructor_id);
            return view('dashboard.instructor.updatelesson')
                ->with('courses', $courses)
                ->with('courseLessons', $courseLesson);
        }
        return view('dashboard.instructor.error')->with('errorMessage', 'there no course lesson match this id');
    }

    public function processupdateLesson(Request $request)
    {
        if ($this->lessonService->updateLesson($request))
            return view('dashboard.instructor.success')->with('message', 'course lesson  updated successfully');

        return view('dashboard.instructor.error1')->with('errorMessage', $this->lessonService->errors());
    }

    //end functions of courses_lessons

    //start functions of lesson comments

    public function getCommentsByLessonId($lessonId = 0)
    {
        $comments = $this->courseLessonCommentService->getCommentsByLessonId($lessonId);
        if (count($comments) > 0) {
            return view('dashboard.instructor.allcomments')
                ->with('commentsList', $comments);
        } else {
            return view('dashboard.instructor.error')->with('errorMessage', 'there is no comments yet!');
        }
    }

    public function addComment($lesson_id)
    {
        $comment = $this->courseLessonCommentService->getCommentsByLessonId($lesson_id);

        return view('dashboard.instructor.addcomment')
            ->with('lesson_id', $lesson_id)
            ->with('comment', $comment);

    }

    public function processAddCourseLessonComment(Request $request)
    {
        if ($this->courseLessonCommentService->addComment($request))
            return view('dashboard.instructor.success')->with('message', 'course lesson comment Added successfully');
        return view('dashboard.instructor.error')->with('errorMessage', $this->courseLessonCommentService->errors());

    }

    public function updateComment($commentId = 0)
    {
        $courseLessonComment = $this->courseLessonCommentService->getCommentsByCommentId($commentId);
        if (count($courseLessonComment) > 0) {

            return view('dashboard.instructor.updatecomment')
                ->with('courseLessonComments', $courseLessonComment);
        }
        return 'there no comment ';

    }

    public function processupdateComment(Request $request)
    {
        if ($this->courseLessonCommentService->updateComment($request))

            return view('dashboard.instructor.success')->with('message', 'course comment updated successfully');

        return view('dashboard.instructor.error1')->with('errorMessage', $this->courseLessonCommentService->errors());
    }

    public function deleteComment($commentId = 0)
    {
        if ($this->courseLessonCommentService->deletecomment($commentId))
            return view('dashboard.instructor.success')->with('message', 'course comment deleted successfully');
        return view('dashboard.instructor.error1')->with('errorMessage', $this->courseLessonCommentService->errors());

    }

    public function getCommentsByUserId($userId = 0)
    {
        $comment = $this->courseLessonCommentService->getCommentsByUserId($userId);
        if (count($comment) > 0) {
            return view('userComments')
                ->with('commentList', $comment);
        } else {
            return 'there is no comments';
        }
    }
}