<?php

namespace OpenMooc\Courses\Repositories;
use Illuminate\Http\Request;
use OpenMooc\Courses\Models\CoursesLessonsComments;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class coursesLessonsCommentsRepositories extends  Repository
{

    /**
     * add comment
     * @param $commentData
     * @return bool
     */
    public function addComment($Data)
    {
        $comment             = new CoursesLessonsComments();
        $comment->comment    = $Data['comment'];
        $comment->created_by = $Data['created_by'];
        $comment->lesson_id  = $Data['lesson_id'];

        //store
        if($comment->save())
            return true;
        else
            return false;

    }

    /**
     * update comment by id
     * @param $data
     * @return bool
     */
    public function updateCommentById($data)
    {
        $comment = CoursesLessonsComments::find($data['id']);
        $comment->comment = $data['comment'];

        //store
        if($comment->save())
            return true;
        else
            return false;

    }

    /**
     * delete comment by id
     * @param $id
     * @return bool|string
     * @throws \Exception
     */
    public function deleteCommentById($id)
    {
        $comment = CoursesLessonsComments::find($id);
        if(!$comment)
        {
            return 'this comment is not found or deleted';
        }
        else
        {
            $comment->delete();
            return true;
        }
    }

    /**
     * get comment by id
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function getCommentById($id)
    {
        return CoursesLessonsComments::find($id);
    }

    /**
     * get comment by user id
     * @param $id
     * @return mixed
     */
    public function getCommentsByUserId($id)
    {
        $comments = DB::table('courses_lessons_comments')->leftJoin('users', 'courses_lessons_comments.created_by', '=', 'users.id')
            ->where('created_by',$id)
            ->get();
        if(count($comments) > 0)
            return $comments;
    }

    /**
     * delete comment by lesson  id
     * @param $id
     * @return mixed
     */
    public function getCommentsByLessonId($id)
    {
        $comments = DB::table('courses_lessons_comments')->leftJoin('users', 'courses_lessons_comments.created_by', '=', 'users.id')
            ->where('lesson_id',$id)->select('courses_lessons_comments.*','users.username')
            ->get();
        if(count($comments) > 0)
            return $comments;
    }



}