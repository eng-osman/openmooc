<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/7/2018
 * Time: 8:44 AM
 */

namespace App\Http\Controllers;


use OpenMooc\Courses\Services\coursesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenMooc\Users\Models\Users;

class courseController
{
    private $coursesService;

    public function __construct()
    {
        $this->coursesService = new coursesService();
    }

    public function addCourse()
    {
        $users = Users::all()->where('user_group',3);
        $categories = DB::table('courses_categories')

            ->get();
        return view('addcourse')
            ->with('users', $users)
            ->with('categories', $categories);
    }

    public function processAddCourse(Request $request)
    {
        if ($this->coursesService->addCourse($request))
            return 'course Added';

        return $this->coursesService->errors();
    }

    // update courses


    public function updateCourse(courseEntity $course)
    {
        //array of data
        $data = [
            'course_id' => $course->getCourseId(),
            'course_name' => $course->getCourseName(),
            'course_category' => $course->getCourseCategory(),
            'course_instructor' => $course->getCourseInstructor(),
            'course_description' => $course->getCourseDescription(),
            'course_cover' => $course->getCourseCover(),
            'is_active' => $course->getisActive()
        ];

        //update courses by id

        return $this->Update($data, "WHERE `course_id`=" . $data['course_id']);


    }

    // update active

    public function updateCourseActiveStatus(courseEntity $course)
    {
        // get status
        $date = ['is_active' => $course->getisActive()];
        //query update
        $query = $this->Update($date, "WHERE `course_id`=" . $course->getCourseId());

        return $query;

    }


    public function deleteCourse($id = 0)
    {
        if ($this->coursesService->deleteCourse($id))
            return 'course deleted';
        return $this->coursesService->errors();
    }


    public function getCourses()
    {

        $courses = $this->coursesService->getCourses();

        return view('course')
            ->with('coursesList', $courses);

    }


    public function getCoursesByInstructor($id=0)
    {  $courses = $this->coursesService->getCoursesByInstructor($id);
        if(count($courses)>0){
        return view('course')
        ->with('coursesList', $courses);}
        return 'there is no course matched';
    }


    public function getCoursesByCategory($category_id=0)
    {$courses = $this->coursesService->getCoursesByCategory($category_id);
        if(count($courses)>0){
            return view('course')
                ->with('coursesList', $courses);}
        return 'there is no course matched';
    }


    public function getCoursesByStudentId($studentId)

        {$courses = $this->coursesService->getCoursesByStudentId($studentId);
            if(count($courses)>0){
                return view('course')
                    ->with('coursesList', $courses);}
            return 'there is no course matched';
    }


    public function getCoursesByActiveStatus($status=1)
    {
        $courses = $this->coursesService->getCoursesByActiveStatus($status);
        if(count($courses)>0){
            return view('course')
                ->with('coursesList', $courses);}
        return 'there is no course matched';

    }


    public function getCourse($id=0)
    {
        $courses = $this->coursesService->getCourse($id);
        if(count($courses)>0){
            return view('course')
                ->with('coursesList', $courses);}
        return 'there is no course matched';
    }

    public function searchCourses($keywords)
    {
        $courses = $this->coursesService->searchCourses($keywords);

        if(count($courses)>0){
            return view('course')
                ->with('coursesList', $courses);}
        return 'there is no course matched';
    }
}