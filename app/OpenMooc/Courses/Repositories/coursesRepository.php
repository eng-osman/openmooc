<?php

namespace OpenMooc\Courses\Repositories;
use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;

class coursesRepository extends Repository
{

    // add course to DB[`courses`]
    public  function addCourse($dataCourses= [])
    {
        // repository [add courses ]
        $course = new Courses();
        $course->course_name            = $dataCourses['courseName'];
        $course->course_category        = $dataCourses['courseCategory'];
        $course->course_instructor      = $dataCourses['courseInstructor'];
        $course->course_description     = $dataCourses['courseDescription'];
        $course->course_cover           = $dataCourses['courseCover'];
        $course->is_active              = $dataCourses['courseActive'];

        // check add course
        if($course->save())
            return true;

        return false;

    }

    // get course by id
    public function getCourseById($id)
    {
        return Courses::find($id);
    }

    //get all course from DB
    public function getAllCourses()
    {
        $courses = DB::table('courses')->leftJoin('courses_categories','courses.course_category', '=', 'courses_categories.category_id')
                                       ->leftJoin('users','course.course_instructor','=', 'users.id');

        if($courses && count($courses) > 0)
            return $courses;
        else
            return false;
    }

    // delete course by id
    public function deleteCourseById($id)
    {
        $course  = Courses::find($id);
        //check
        if($course)
        {
            $course->delete();
            return true;
        }
        else
        {
            echo 'this course is not found';
            return false;
        }
    }

    //update courses by id
    public function updateCourseById($dataCourses= [])
    {
        // repository [update courses ]
        $course = Courses::find($dataCourses['course_id']);
        $course->course_name            = $dataCourses['courseName'];
        $course->course_category        = $dataCourses['courseCategory'];
        $course->course_instructor      = $dataCourses['courseInstructor'];
        $course->course_description     = $dataCourses['courseDescription'];
        $course->course_cover           = $dataCourses['courseCover'];
        $course->is_active              = $dataCourses['courseActive'];

        //update
        if($course->save())
            return true;
        else
            return false;

    }

    //update Course Active Status
    public function updateCourseActiveStatus($activation)
    {
        $courses = DB::table('courses')
            ->leftJoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
            ->where('courses.is_active',$activation)
            ->get();


        if($courses && count($courses) > 0)
            return $courses;
        else
            return false;
    }

    //get courses by instructor[name]
    public function getCoursesByInstructor($id)
    {
        $courses = DB::table('courses')
            ->leftJoin('courses_categories', 'courses.course_category', '=', 'courses_categories.category_id')
            ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
            ->where('courses.course_instructor',$id)
            ->get();
        if( $courses && count($courses)>0)
            return $courses;
        else
            return false;
    }

    // get courses by student id

    public function getCoursesByStudentId($studentId)
    {
        $courses = DB::table('courses_students')
            ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
            ->where('courses_students.student_id','=',$studentId)
            ->get();
        if( $courses && count($courses)>0)
            return $courses;
        else
            return false;
    }


    //get course by category id
    public function getCourseByCategoryId($id)
    {
        $courseByCat = DB::table('courses')->leftJoin('courses_categories', 'courses.course_category','courses_categories.category_id')
                                           ->leftJoin('users', 'courses.course_instructor', '=', 'users.id')
                                           ->where('course.course_category',$id)->get();
        if(count($courseByCat) > 0 && $courseByCat)
            return $courseByCat;
        else
            return false;
    }

    //search courses
    public function searchCourses($keyword)
    {
        $courses = DB::table('courses')
            ->where('course_name', 'like','%' . $keyword .'%' )
            ->get();
        if($courses &&  count($courses)>0)
            return $courses;
        else
            return false;
    }

}