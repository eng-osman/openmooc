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
        $course->course_name = $courseData['name'];
        $course->course_category = $courseData['category'];
        $course->course_instructor = $courseData['instructor'];
        $course->course_description = $courseData['description'];
        $course->is_active = $courseData['status'];

        return ($course->save()==true) ? true:false;
    }

    // update courses

    public function updateCourseProcess($courseData, $id)
    {
        $course = Courses::find($id);
        $course->course_name        = $courseData['name'];
        $course->course_category    = $courseData['category'];
        $course->course_instructor  = $courseData['instructor'];
        $course->course_description = $courseData['description'];
        $course->is_active          = $courseData['status'];
        return ($course->save()==true) ? true: false;
    }


    public function updateCourseActiveStatus($course)
    {
        $item = [
            'is_active' => $course['is_active']
        ];
        if (DB::table('courses')
            ->where('courses.course_id', $course['course_id'])
            ->update($item)
        )
            return true;
        return false;
    }

    // delete courese by id
    public function deleteCourse($id)
    {
        $course = Courses::find($id);
       return $course->delete();
    }

    // get all coures
    public function getCourses()
    {
        $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_name', 'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
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
        $course = Courses::find($id);
//        $courses = DB::table('courses')
//            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
//            ->join('users', 'courses.course_instructor', '=', 'users.id')
//            ->select('courses.course_name', 'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
//            ->where('courses.course_id', '=', $id)
//            ->get();
        return $course;
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