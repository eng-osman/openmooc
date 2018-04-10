<?php

namespace OpenMooc\Courses\Repositories;

use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;

class coursesRepository extends Repository
{
    public function addCourse($course)
    {
        //get item
        $item = [
            'course_name' => $course['name'],
            'course_category' => $course['category'],
            'course_instructor' => $course['instructor'],
            'course_description' => $course['description'],
            'is_active' => $course['status']
        ];
        //insert date
        if (DB::table('courses')->insert([$item]))
            return true;
        return false;
    }

    // update courses


    public function updateCourse($course)
    {
        //array of data
        $item = [
            'course_name' => $course['course_name'],
            'course_category' => $course['course_category'],
            'course_instructor' => $course['course_instructor'],
            'course_description' => $course['course_description'],
            'is_active' => $course['is_active']
        ];
        if (DB::table('courses_lessons')
            ->where('courses.course_id', $course['course_id'])
            ->update($item)
        )
            return true;
        return false;
        //update courses by id
    }

    // update active

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
        $course = DB::table('courses')
            ->where('courses.course_id', '=', $id)
            ->get();
        if ($course) {
            DB::table('courses')->delete()->where('courses.course_id', '=', $id);
            return true;
        }
        return false;
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

    public function getCoursesByInstructor($InstructorId = 0)
    {
        $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_name', 'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
            ->where('courses.course_instructor', '=', $InstructorId)
            ->get();
        return $courses;
    }

    // coures careg
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
    public function getCourse($id = 0)
    {
        $courses = DB::table('courses')
            ->join('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->join('users', 'courses.course_instructor', '=', 'users.id')
            ->select('courses.course_name', 'users.username', 'courses_categories.category_name', 'courses.course_description', 'courses.is_active')
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