<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:19 PM
 */

namespace OpenMooc\Courses\Services;


use OpenMooc\Courses\Repositories\commentsRepository;
use OpenMooc\Service;
use Validator;
class commentsService extends Service
{
    public function addComment($request)
    {
        $rules = [
            'comment'     => 'required|max:500',
            'created_by'  => 'required|integer',
            'lesson_id'   => 'required|integer'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cRepository = new commentsRepository();
        if($cRepository->addComment($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function getComments()
    {
        $cRepository = new commentsRepository();
        $comments = $cRepository->getComments();
        if($comments){
            return $comments;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function getCommentsByLessonId($id)
    {
        $cRepository = new commentsRepository();
        $comments = $cRepository->getCommentsByLessonId($id);
        if($comments){
            return $comments;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getcomment($id)
    {
        $cRepository = new commentsRepository();
        $comment = $cRepository->getcomment($id);
        if($comment){
            return $comment;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function updateComment($request)
    {
        $rules = [
            'comment'     => 'required|max:500',
            'created_by'  => 'required|integer',
            'lesson_id'   => 'required|integer'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $cRepository = new commentsRepository();
        if($cRepository->updateComment($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function deleteComment($id)
    {
        $cRepository = new commentsRepository();
        if($cRepository->deleteComment($id)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }


    public function getCommentsByUserId($id)
    {
        $cRepository = new commentsRepository();
        $comments = $cRepository->getCommentsByUserId($id);
        if($comments){
            return $comments;
        }else{
            $this->setError('Error');
            return false;
        }
    }

}