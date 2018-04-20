<?php
/**
 * Created by PhpStorm.
 * User: شوشو
 * Date: 05-Apr-18
 * Time: 9:29 PM
 */

namespace App\Http\Controllers;

use OpenMooc\Courses\Models\CoursesLessonsComments;
use OpenMooc\Courses\Services\coursesLessonsCommentsService;
use Validator;
use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesLessons;
use OpenMooc\Users\Models\User;
use Illuminate\Support\Facades\DB;


class coursesLessonsCommentsController extends Controller
{


    private $courseLessonCommentService;

    public function __construct()
    {
        $this->courseLessonCommentService = new coursesLessonsCommentsService();
    }

    public function addComment()
    {
        $users = DB::table('users')->get();

        $coursesLessons = DB::table('courses_lessons')->get();

        return view('addComment')
            ->with('users', $users)
            ->with('coursesLessons', $coursesLessons);
    }

    public function processAddCourseLessonComment(Request $request)
    {
        if ($this->courseLessonCommentService->addComment($request))
            return 'course lesson comment Added';

        return $this->courseLessonCommentService->errors();
    }

    public function updateComment($commentId = 0)
    {
        $courseLessonComment = DB::table('courses_lessons_comments')
            ->where('courses_lessons_comments.comment_id', '=', $commentId)
            ->get();
        if (count($courseLessonComment) > 0) {
            $users = DB::table('users')->get();
            return view('updatecomment')
                ->with('users', $users)
                ->with('courseLessonComment', $courseLessonComment);
        }
        return 'there no comment ';

    }

    public function processupdateComment(Request $request)
    {
        if ($this->courseLessonCommentService->updateComment($request))
            return 'course comment updated';

        return $this->courseLessonCommentService->errors();
    }

    public function deleteComment($commentId=0)
    {
        if ($this->courseLessonCommentService->deletecomment($commentId))
            return 'course lesson deleted';
        return $this->courseLessonCommentService->errors();
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

    public function getCommentsByLessonId($lessonId=0)
    {
        $lesson = $this->courseLessonCommentService->getCommentsByLessonId($lessonId);
        if (count($lesson) > 0) {
            return view('lessons')
                ->with('lessonsList', $lesson);
        }
        else {
            return 'there is no comments';
        }
    }


}