<?php

namespace OpenMooc\Courses\Repositories;

use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesLessonsComments;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class commentsRepository extends Repository
{
    //add comment
    public function addComment($commentData)
    {
        $comment = new CoursesLessonsComments();
        $comment->comment    = $commentData['comment'];
        $comment->created_by = $commentData['created_by'];
        $comment->lesson_id  = $commentData['lesson_id'];
        if($comment->save()){
            return true;
        }else{
            return false;
        }
    }

    //get all comments of a lesson
    public function getCommentsByLessonId($id)
    {
        $comments = DB::table('courses_lessons_comments')
            ->leftJoin('users', 'courses_lessons_comments.created_by', '=', 'users.id')
            ->where('lesson_id','=',$id)
            ->get();
        if(count($comments)>0)
           return $comments;
    }

    //get comment
    public function getcomment($id)
    {
        return CoursesLessonsComments::find($id);
    }

    //update comment
    public function updateComment($data)
    {
        $comments = CoursesLessonsComments::find($data['id']);
        $comments->comment = $data['comment'];
        if($comments->save()){
            return true;
        }else{
            return false;
        }
    }

    //delete comment
    public function deleteComment($id)
    {
        $comment = CoursesLessonsComments::find($id);
        if(!$comment){
            return 'comment not found';
        }else{
            $comment->delete();
            return true;
        }
    }

    // get comment by User
    public function getCommentsByUserId($id)
    {
        $comments = DB::table('courses_lessons_comments')
            ->leftJoin('users', 'courses_lessons_comments.created_by', '=', 'users.id')
            ->where('created_by','=',$id)
            ->get();
        if(count($comments)>0)
           return $comments;
    }

}