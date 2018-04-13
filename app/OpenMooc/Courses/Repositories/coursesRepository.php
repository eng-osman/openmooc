<?php

namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class coursesRepository extends Repository
{
    // add course
    public function addCourse($courseData)
    {
        $course = new Courses();
        $course->course_name        = $courseData['title'];
        $course->course_category    = $courseData['category'];
        $course->course_instructor  = $courseData['instructor'];
        $course->course_description = $courseData['description'];
        $course->course_cover       = $courseData['cover'];
        $course->is_active          = $courseData['active'];

        if($course->save())
            return true;

        return false;
    }

    // get all courses
    public function getCourses()
    {
        $courses = DB::table('courses')
            ->leftJoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.*','courses_categories.category_name','users.name')
            ->get();
        if(count($courses)>0)
           return $courses;
    }

    // get course By Id
    public function getCourse($id)
    {
        return Courses::find($id);
    }

    // get courses By Category Id
    public function getCoursesByCategory($id)
    {
        $courses = DB::table('courses')
            ->leftJoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.*','courses_categories.category_name','users.name')
            ->where('course_category','=',$id)
            ->get();
        if(count($courses)>0)
           return $courses;
    }

    // get courses By Instructor ID
    public function getCoursesByInstructor($id)
    {
        $courses = DB::table('courses')
            ->leftJoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.*','courses_categories.category_name','users.name')
            ->where('course_instructor','=',$id)
            ->get();
        if(count($courses)>0)
           return $courses;
    }

    // get courses by student
    public function getCoursesByStudentId($studentId)
    {
        $courses = DB::table('courses_students')
            ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
            ->select('courses.*','courses_categories.category_name','users.name')
            ->where('student_id','=',$studentId)
            ->get();
        if(count($courses)>0)
           return $courses;
    }

    // get courses by status
    public function getCoursesByActiveStatus($status)
    {
        $courses = DB::table('courses')
            ->leftJoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.*','courses_categories.category_name','users.name')
            ->where('courses.is_active','=',$status)
            ->get();
        if(count($courses)>0)
           return $courses;
    }

    //update course
    public function updateCourse($Data)
    {
        $course = Courses::find($Data['id']);
        $course->course_name          = $Data['course_name'];
        $course->course_category      = $Data['course_category'];
        $course->course_instructor    = $Data['course_instructor'];
        $course->course_description   = $Data['course_description'];
        $course->course_cover         = $Data['course_cover'];
        $course->is_active            = $Data['is_active'];
        if($course->save()){
            return true;
        }else{
            return false;
        }
    }

    // update course status
    public function updateCourseActiveStatus($Data)
    {
        $course = Courses::find($Data['id']);
        $course->is_active = $Data['is_active'];
        if($course->save()){
            return true;
        }else{
            return false;
        }
    }

    // delete course
    public function deleteCourse($id)
    {
        $course = Courses::find($id);
        if(!$course){
            return 'course not found';
        }else{
            $course->delete();
            return true;
        }
    }

    // search about course by course name
    public function searchCourses($keyword)
    {
        $courses = DB::table('courses')
            ->leftJoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.*','courses_categories.category_name','users.name')
            ->where('course_name', 'like','%' . $keyword .'%' )
            ->get();
        if(count($courses)>0)
           return $courses;
    }
}