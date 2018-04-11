<?php
namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\CoursesStudents;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;
class courses_StudentsRepository extends Repository
{
    /**
     * Addin a row with Model
     */
    function add($studentId,$course_id,$is_approved) {
        $CoursesStudents= new CoursesStudents();
        $CoursesStudents->student_id = $studentId;
        $CoursesStudents->course_id = $course_id;
        $CoursesStudents->is_approved = $is_approved;
        if($CoursesStudents->save())
            return true;
        return false;
        }
    /**
     * Delete By ID
     */
        function delete($id){
            $CoursesStudents= new CoursesStudents();
            if($CoursesStudents->destroy($id)) {
                echo "THe row has been Deleted";
                return true;
            }else return false ;
        }
    /**
     * Select All By Model
     */
        function getAll(){
            $users= CoursesStudents::all();
            return $users ;
        }
        function getBy_Course_Id(){
            return CoursesStudents::orderBy('course_id','ASC')->get();
        }
    /**
     * Select All By Query Builder
     */
        function getAll_joined(){
        $users = DB::table('courses_students')
                ->join('users', 'student_id','=', 'users.id')
                ->join('courses', 'courses_students.course_id', '=', 'courses.course_id')
                ->select('courses_students.*', 'users.name', 'courses.course_name')
                ->orderby ('id')
                ->get();
        return $users;
            }

}