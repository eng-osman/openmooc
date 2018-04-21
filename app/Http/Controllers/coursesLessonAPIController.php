<?php
/**
 * Created by PhpStorm.
 * User: شوشو
 * Date: 19-Apr-18
 * Time: 10:54 AM
 */

namespace App\Http\Controllers;


use OpenMooc\Courses\Services\coursesCategoriesService;
use OpenMooc\Courses\Services\coursesLessonService;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class coursesLessonAPIController extends  Controller
{


    private $lessonService;

    public function __construct()
    {
        $this->lessonService = new coursesLessonService();
    }

    public function viewLessonByInstructorId($id)
    {
        $instructor = $this->lessonService->getLessonsByInstructorId($id);

        $responseData = [];
        $responseData['status'] = ($instructor) ? true: false;
        $responseData['message'] = ($instructor) ? 'success': 'Instructor id not found';
        $responseData['errors'] = [];
        $responseData['data'] =  $instructor;
        $statusCode = ($instructor) ? 200 : 404;

        return response()->json($responseData, $statusCode);


    }


    public function viewLessonsByCourseId($course_id = 0)
    {
        $lesson = $this->lessonService->getLessonsByCourseId($course_id);

        $responseData = [];
        $responseData['status'] = ($lesson) ? true: false;
        $responseData['message'] = ($lesson) ? 'success': 'Lesson id not found';
        $responseData['errors'] = $this->lessonService->errors();
        $responseData['data'] =  $lesson;
        $statusCode = ($lesson) ? 200 : 404;

        return response()->json($responseData, $statusCode);


    }


    public function addLesson()
    {
        $instructors = DB::table('users')
            ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
            ->where('users_groups.group_name', 'like', "%instructors%")
            ->get();
        $courses = DB::table('courses')->get();

        $responseData['status'] = ($instructors) ? true : false;
        $responseData['message'] = ($instructors) ? 'courses lesson details' : 'no courses lesson!';
        $responseData['users_groups'] = ($instructors) ? $instructors : null;

        return response()->json($responseData);
    }

    public function processaddLesson(Request $request)
    {
        if ($this->lessonService->addLesson($request->json()->all()))
        return response()->json(['status' => true, 'message' => 'course lesson Added']);

        return response()->json(['status' => false, 'message' => 'course lesson not Added', 'error' => $this->lessonService->errors()]);

    }

    public function updateLesson(Request $request )
    {
        $data = $request->json()->all();
        $id = $data['id'];
        $responseData = [];
        $courseLesson = DB::table('courses_lessons')
            ->where('courses_lessons.lesson_id', '=', $id)
            ->get();
        if (count($courseLesson) > 0) {
            $instructors = DB::table('users')
                ->join('users_groups', 'users.user_group', '=', 'users_groups.group_id')
                ->where('users_groups.group_name', 'like', "%instructors%")
                ->get();
            $courses = DB::table('courses')->get();

            $instructor = ($instructors) ? $instructors : null;
            $course = ($courses) ? $courses : null;
            $responseData['status'] = ($instructors) ? true : false;
            $responseData['message'] = ($instructors) ? 'update courses lesson' : 'not update';
            $responseData['course'] = ($course) ? $course : null;
            return response()->json($responseData);


        }
        return 'there no course lesson match this id';


    }


    public function processupdateLesson(Request $request)
    {
        if ($responseData = $this->lessonService->updateLesson($request))
            return response()->json($responseData);

        return response(['status'=>false,'message'=>'course not updated','errors'=>$this->lessonService->errors()]);
    }



    public function deleteLesson($lessonId = 0)
    {
        $deleteLesson = $this->lessonService->deleteLesson($lessonId);
        if ($deleteLesson)
        {
            $responseData['status'] = true;
            $responseData['message'] = 'course lesson deleted successfully';
            $responseData['error'] = 'not found error';
            $statusCode = 200;
            return response()->json($responseData,$statusCode);
        }

        $responseData['status'] = false;
        $responseData['message'] = 'Failed to delete';
        $responseData['error'] = $this->lessonService->errors();
        $statusCode = 404;
        return response()->json($responseData,$statusCode);


    }






}