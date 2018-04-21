<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Models\CoursesLessonsComments;
use OpenMooc\Courses\Services\coursesRateServices;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Courses\Services\coursesLessonsServices;
use OpenMooc\Courses\Services\coursesStudentsServices;
use OpenMooc\Courses\Services\coursesLessonsCommentsServices;

class studentController extends Controller
{

    // index
    public function index()
    {
        $coursesServ = new coursesService();
        $courses     = $coursesServ->getAllCourses();
        return view('dashboard.student.index')->with('courses',$courses);
    }

    /**
     * get course by id
     */
    public  function CourseDetails($id)
    {
        //courses sevices
        $courseServ  = new coursesService();
        $course      = $courseServ->getCourseById($id);
        // lessons service
        $lessonsServ = new coursesLessonsServices();
        $lessons     = $lessonsServ->getLessonsByCourseId($id);
        //rate service
        if($course && $lessons )
            return view('dashboard.student.course')->with('course',$course)->with('lessons',$lessons);
    }


    /**
     * get lesson and comment
     */
    public function lessonAndComments($id)
    {
        //lessons service
        $lessonServ = new coursesLessonsServices();
        $lesson     = $lessonServ->getLessonById($id);
        // comments services
        $commentsServ = new coursesLessonsCommentsServices();
        $comments = $commentsServ->getCommentsByLessonId($id);
        if($lesson && $comments)
            return view('dashboard.student.courseLessons')->with('lesson',$lesson)->with('comments',$comments);
        else
            return $commentsServ->errors();

    }


    /**
     * add comment on lesson
     */
    public function addCommentOnLesson(Request $request)
    {

        $commentServ  = new coursesLessonsCommentsServices();
        if ($comment      = $commentServ->addComment($request))
            return redirect()->back();
        else
            return $commentServ->errors();
    }

    /**
     * delete comment
     */

    public function deleteCommentFromLesson($id)
    {
        $commentServ = new coursesLessonsCommentsServices();
        $comment     = $commentServ->deleteCommentById($id);
        if($comment)
            return redirect()->back();
        else
            return $commentServ->errors();

    }

    /**
     * update comment
     */

    public function updateComment($id)
    {
        $commentServ = new coursesLessonsCommentsServices();
        $comment     = $commentServ->getCommentById($id);
        return view('dashboard.student.updateComment')->with('comment',$comment);
    }
    /**
     * update comment
     */

    public function updateCommentToDB(Request $request)
    {
        $commentServ = new coursesLessonsCommentsServices();
        if($comment     = $commentServ->updateCommentById($request->all()))
            return redirect('student');
        else
            $commentServ->errors();
    }

    /**
     * public function get average rate
     */
    public function averageRateByCourseId($id)
    {
        $rateServ = new coursesRateServices();
        $rate     = $rateServ->getAVGRateByCourseId($id);
    }

    /**
     * add subscription
     */
    public function addSubscription()
    {
        $courses     = Courses::all();
        return view('dashboard.student.addSubscription')->with('courses',$courses);

    }

    /**
     * add subscripe to db
     */
    public function addSubscribeToDB(Request $request)
    {
        $subscriptionServ  = new coursesStudentsServices();
        if ($subscription      = $subscriptionServ->addStudentToCourse($request))
            return redirect('student');
        else
            return $subscriptionServ->errors();


    }

    /**
     * add rate
     */
    public  function addRate()
    {
        return view('dashboard.student.addRate');
    }

    /**
     * add rateToDB
     */
    public  function addRateToDB(Request $request)
    {
        $rateServ = new coursesRateServices();
        if($rate     = $rateServ->addRate($request))
            return redirect('student');
        else
            return $rateServ->errors();
    }










































    /**
     * approve Subscription
     * @param Request $request
     */
    public function approveSubscription()
    {
        $courses     = Courses::all();
        return view('dashboard.student.updateSubscription')->with('courses',$courses);

    }


    /**
     * add subscripe to db
     */
    public function approveSubscriptionToDB(Request $request)
    {
        $subscriptionServ  = new coursesStudentsServices();
        if ($subscription      = $subscriptionServ->approveSubscription($request))
            return redirect('student');
        else
            return $subscriptionServ->errors();


    }

}