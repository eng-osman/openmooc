<?php

namespace OpenMooc\Courses\Services;
use OpenMooc\Courses\Repositories\coursesLessonsCommentsRepositories;
use OpenMooc\Service;
use Validator;

class coursesLessonsCommentsServices extends  Service
{

    /**
     * add comment
     * @return bool
     */
    public function addComment($request)
    {
        $rules = [
            'comment'     => 'required|min:5|max:1000',
            'created_by'  => 'required|integer',
            'lesson_id'   => 'required|integer'
        ];
        //validation
        $validator = Validator::make($request->all(),$rules);
        //check
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $commentsRepo = new coursesLessonsCommentsRepositories();
        if($commentsRepo->addComment($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Adding');
            return false;
        }
    }


    /**
     * update comment by id
     * @return bool
     */
    public function updateCommentById($request)
    {

        $rules = [
            'comment'     => 'required|min:5|max:1000',
            'created_by'  => 'required|integer',
            'lesson_id'   => 'required|integer'
        ];
        //validation
        $validator = Validator::make($request->all(),$rules);
        //check
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        //use repo
        $commentsRepo = new coursesLessonsCommentsRepositories();
        if($commentsRepo->updateCommentById($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Updating');
            return false;
        }
    }


    /**
     * delete comment by id
     * @param $id
     * @return bool
     */
    public function deleteCommentById($id)
    {
        $commentsRepo = new coursesLessonsCommentsRepositories();
        if($commentsRepo->deleteCommentById($id))
        {
            return true;
        }
        else
        {
            $this->setError('Error Deleting');
            return false;
        }
    }

    /**
     * get comment by id
     * @param $id
     * @return bool
     */
    public function getCommentById($id)
    {
        $commentsRepo = new coursesLessonsCommentsRepositories();
        $comment      = $commentsRepo->getCommentById($id);

        if($comment)
        {
            return $comment;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

    /**
     * get Comments By User Id
     * @param $id
     * @return bool
     */
    public function getCommentsByUserId($id)
    {
        $cRepository = new coursesLessonsCommentsRepositories();
        $comments = $cRepository->getCommentsByUserId($id);
        //check
        if($comments)
        {
            return $comments;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }


    /**
     * fet comment by lesson id
     * @param $id
     * @return bool|mixed
     */
    public function getCommentsByLessonId($id)
    {
        $commentsRepo = new coursesLessonsCommentsRepositories();
        $comments = $commentsRepo->getCommentsByLessonId($id);
        //check
        if($comments)
        {
            return $comments;
        }
        else
        {
            $this->setError('Error Retrieving data');
            return false;
        }
    }

}