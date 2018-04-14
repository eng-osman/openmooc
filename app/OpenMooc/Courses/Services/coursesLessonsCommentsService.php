<?php
/**
 * Created by PhpStorm.
 * User: شوشو
 * Date: 05-Apr-18
 * Time: 8:53 PM
 */

namespace OpenMooc\Courses\Services;

use Validator;
use Illuminate\Http\Request;

use OpenMooc\Service;
use OpenMooc\Courses\Repositories\coursesLessonsCommentsRepository;
class coursesLessonsCommentsService extends Service
{
    private $courseLessonCommentRepo ;

    public function __construct(){
        $this->courseLessonCommentRepo= new coursesLessonsCommentsRepository();
    }

    public function addComment($request)
    {
        $rules = [
            'comment'       => 'required|min:6|max:500',
            'created_by'    => 'required',
            'lesson_id'     => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store
        if ($this->courseLessonCommentRepo->addComment($request->all()))
            return true;

        $this->setError('Error Saving to database in courses lessons comments');
        return false;
    }

    public function updateComment(Request $req)
    {
        $rules = [
            'comment'       => 'required|min:6|max:500',
        ];
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }
        //store
        if ($this->courseLessonCommentRepo->updateComment($req->all()))
            return true;

        $this->setError('Error updating to database in courses lessons comments');
        return false;
    }

    public function deletecomment($commentId = 0)
    {
        if ($this->courseLessonCommentRepo->deleteComment($commentId)) {
            return true;
        }
        $this->setError('Error deleteing from courses lessons comments database');
        return false;
    }

    public function getCommentsByUserId($userId)
    {
        return $this->courseLessonCommentRepo->getCommentsByUserId($userId);
    }

    public function getCommentsByLessonId($lessonId)
    {
        return $this->courseLessonCommentRepo->getCommentsByLessonId($lessonId);
    }

    public function getCommentsByCommentId($commentId)
    {
        return $this->courseLessonCommentRepo->getCommentsByCommentId($commentId);
    }


    public function getAllComments()
    {
       return $this->courseLessonCommentRepo->getAllComments();
    }

}