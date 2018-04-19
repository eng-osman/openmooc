<?php

namespace OpenMooc\Courses\Repositories;

use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class coursesRepository extends Repository
{
    public function addCourse($courseData = [])
    {
        $course  = new Courses();
        $course->course_name = $courseData['course'];
        $course->course_category = $courseData['category'];
        $course->course_instructor = $courseData['instructor'];
        $course->course_description = $courseData['description'];
        $course->is_active = $courseData['status'];

        return ($course->save()==true) ? true:false;
    }

    // update courses

    public function updateCourseProcess($courseData)
    {
        $item = [
        'course_name'        => $courseData['course_name'],
        'course_category'    => $courseData['course_category'],
        'course_instructor'  => $courseData['course_instructor'],
        'course_description' => $courseData['course_description'],
        'is_active'          => $courseData['is_active']
        ];
        if (DB::table('courses')
            ->where('course_id', $courseData['course_id'])
            ->update($item)
        )
            return true;
        return false;
    }


    public function updateCourseActiveStatus($course)
    {
        $item = [
            'is_active' => $course['is_active']
        ];

        return  $query= DB::table('courses')
            ->where('courses.course_id', $course['course_id'])
            ->update($item);

    }

    // delete courese by id
    public function deleteCourse($id)
    {
        $del = DB::table('courses')->where('course_id','=',$id)->delete();

        return $del ;

    }

    // get all coures
    public function getCourses()
    {
        $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.*', 'users.username','courses_categories.category_name')
            ->get();
        return $courses;
    }

    public function getCoursesByInstructor($InstructorId)
    {
        $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_id','courses.course_name','courses.course_instructor' ,'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
            ->where('courses.course_instructor', '=', $InstructorId)
            ->get();
        return $courses;
    }

    // courses by category
    public function getCoursesByCategory($category_id)
    {
        $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_name', 'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
            ->where('courses.course_category', '=', $category_id)
            ->get();
        return $courses;
    }


    public function getCoursesByStudentId($student_id)
    {
        $courses = DB::table('courses')
            ->join('courses_students', 'courses.course_id', '=', 'courses_students.course_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_name', 'courses.course_description', 'courses.is_active', 'courses_students.is_approved', 'users.name')
            ->where('courses_students.student_id', '=', $student_id)
            ->get();
        return $courses;
    }

    // get coures where status = 1
    public function getCoursesByActiveStatus($status = 1)
    {
        $courses = DB::table('courses')
            ->leftjoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftjoin('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_name', 'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
            ->where('courses.is_active', '=', $status)
            ->get();
        return $courses;
    }

    // get course
    public function getCourse($id)
    {

      $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.*', 'users.username', 'courses_categories.category_name')
            ->where('courses.course_id', '=', $id)
            ->get();
        return $courses;
    }

    // search by name and desc
    public function searchCourses($keyword)
    {
        $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_name', 'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
            ->where('courses.course_name', 'like', "%$keyword%")
            ->orWhere('courses.course_description', 'like', "%$keyword%")
            ->get();
        return $courses;
    }
}