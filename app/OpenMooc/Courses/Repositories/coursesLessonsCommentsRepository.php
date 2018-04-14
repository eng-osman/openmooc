<?php
/**
 * Created by PhpStorm.
 * User: شوشو
 * Date: 05-Apr-18
 * Time: 8:53 PM
 */

namespace OpenMooc\Courses\Repositories;

use OpenMooc\Repository;
use OpenMooc\Courses\Models\CoursesLessonsComments;
//use Illuminate\Database\Query;
use Illuminate\Support\Facades\DB;



class coursesLessonsCommentsRepository extends Repository
{

    public function addComment($comment)
    {
        //get item
        $item = [
            'comment'      =>$comment['comment'],
            'created_by'    =>$comment['created_by'],
            'lesson_id'     =>$comment['lesson_id']
        ];


        //insert data
        if( DB::table('courses_lessons_comments')->insert([$item]))
            return true;
        return false;

    }

    public function updateComment($commentId)
    {
        $item = [
            'comment'      =>$commentId['comment'],
        ];
        // update Query
        if(DB::table('courses_lessons_comments')
            ->where('comment_id',$commentId['comment_id'] )
            ->update($item))
            return true;

        return false;

    }
    public function deleteComment($commentId)
    {
        $comment= DB::table('courses_lessons_comments')->where('comment_id',$commentId)->get();
        if(count($comment)>0){
            // query delete by id
            if( DB::table('courses_lessons_comments')->where('comment_id',$commentId)->delete())
                return true;
        }
        return false;
    }


    public function getCommentsByUserId($userId=0)
    {
        $comments = DB::table('courses_lessons_comments')
            ->leftJoin('users', 'courses_lessons_comments.created_by', '=','users.id')
            ->select('courses_lessons_comments.comment', 'users.username')
            ->where('courses_lessons_comments.created_by','=',$userId)
            ->get();
        return $comments;


    }


    public function getCommentsByLessonId($lessonId=0)
    {
        $comments = DB::table('courses_lessons_comments')
            ->leftJoin('courses_lessons','courses_lessons_comments.lesson_id','=','courses_lessons.lesson_id')
            ->leftJoin('users','users.id','=','courses_lessons_comments.created_by')
            ->select('courses_lessons_comments.comment','courses_lessons.lesson_title','users.name','users.id','courses_lessons_comments.lesson_id','courses_lessons_comments.comment_id')
            ->where('courses_lessons_comments.lesson_id','=',$lessonId)
            ->get();
        return $comments;
    }
    public function getCommentsByCommentId($commentId=0)
    {
        $comments = DB::table('courses_lessons_comments')
            ->leftJoin('courses_lessons','courses_lessons_comments.lesson_id','=','courses_lessons.lesson_id')
            ->leftJoin('users','users.id','=','courses_lessons_comments.created_by')
            ->select('courses_lessons_comments.comment','courses_lessons.lesson_title','users.name','courses_lessons_comments.lesson_id','courses_lessons_comments.comment_id')
            ->where('courses_lessons_comments.comment_id','=',$commentId)
            ->get();
        return $comments;
    }


    public function getAllComments()
    {
        $comments = DB::table('courses_lessons_comments')
            ->select('comment')
            ->get();
        return $comments;
    }

}