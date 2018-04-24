<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Models\CoursesRate;
use OpenMooc\Courses\Services\coursesCategoriesServices;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Courses\Services\coursesLessonsServices;
use OpenMooc\Courses\Services\coursesLessonsCommentsServices;
use OpenMooc\Courses\Services\coursesStudentsServices;
use OpenMooc\Courses\Services\coursesRateServices;

class studentController extends Controller
{

    /**
     * return all categories
     */
    public function allCategories()
    {
        $categoriesServ = new coursesCategoriesServices();
        $categories     = $categoriesServ->getAllCategories();
        if(count($categories) > 0)
            return view('dashboard.student.categories')->with('categories',$categories);
        else
            return $categoriesServ->errors();
    }

    /**
     * get courses bu category id
     */
    public function getCoursesByCategoryId($id)
    {
        $coursesServ = new coursesService();
        $courses     = $coursesServ->getCourseByCategoryId($id);
        if($courses)
            return view('dashboard.student.categoryCourses')->with('courses',$courses);
        else
            return $coursesServ->errors();
    }

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
     * get all courses
     */
    public function information()
    {
        //courses services
        $coursesServ = new coursesService();
        $courses     = $coursesServ->getAllCourses();
            return view('dashboard.student.information')->with('courses',$courses);
    }

    /**
     * get all rates
     */
    public function getRates()
    {
        $ratesServ = new coursesRateServices();
        $rates     = $ratesServ->getAllRates();
        return view('dashboard.student.rates')->with('rates',$rates);
    }

    /**
     * add rate
     */
    public  function addRate()
    {
        $courses = Courses::all();
        return view('dashboard.student.addRate')->with('courses',$courses);
    }


    /**
     * add rateToDB
     */
    public  function addRateToDB(Request $request)
    {
        $rateServ = new coursesRateServices();
        if($rate     = $rateServ->addRate($request))
            return redirect('student/courses/rates');
        else
            return $rateServ->errors();
    }

    /**
     * delete rate by id
     */
    public function deleteRate($id)
    {
        $rService = new coursesRateServices();
        if($rService->deleteRate($id))
            return redirect('student/courses/rates');
        else
            return $rService->errors();

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
     * check subscription
     */
    public function checkSubscription($studentId=1,$courseId=1)
    {
        $studentServ = new coursesStudentsServices();
        $student     = $studentServ->checkSubscription($studentId,$courseId);
        if($student)
            return view('dashboard.student.course')->with('student',$student);
        else
            return $studentServ->errors();
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