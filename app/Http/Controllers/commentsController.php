<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:19 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Courses\Services\commentsService;

class commentsController extends Controller
{
    public function addComment()
    {
        return view('addcomment');
    }

    public function processaddComment(Request $request)
    {
        $commentService = new commentsService();
        if($commentService->addComment($request)){
            return 'Comment Added';
        }else{
            return $commentService->errors();
        }
    }

    public function getCommentsByLessonId($id)
    {
        $cService = new commentsService();
        $comments = $cService->getCommentsByLessonId($id);
        return view('comments')->with('comments',$comments);
    }


    public function getcomment($id)
    {
        $cService = new commentsService();
        $comment = $cService->getcomment($id);
        return view('updatecomment')->with('comment',$comment);
    }


    public function updateComment(Request $request)
    {
        $cService = new commentsService();
        if($cService->updateComment($request)){
            return 'comment Updated';
        }else{
            return $cService->errors();
        }
    }


    public function deleteComment($id)
    {
        $cService = new commentsService();
        if($cService->deleteComment($id)){
            return 'Comment deleted';
        }else{
            return $cService->errors();
        }
    }


    public function getCommentsByUserId($id)
    {
        $cService = new commentsService();
        $comments = $cService->getCommentsByUserId($id);
        return view('commentsByUser')->with('comments',$comments);
    }

}