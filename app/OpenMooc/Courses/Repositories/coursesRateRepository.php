<?php
/**
 * Created by PhpStorm.
 * User: masne
 * Date: 10/04/2018
 * Time: 10:06 م
 */

namespace OpenMooc\Courses\Repositories;

use Mockery\Exception;
use OpenMooc\Courses\Models\CoursesRate;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;

class coursesRateRepository extends Repository
{
    public function addRate($student_id,$cours_id,$rat,$rate_comment)
    {

        $courseRate= new CoursesRate();
        $courseRate->student_id = $student_id;
        $courseRate->course_id = $cours_id;
        $courseRate->rate = $rat;
        $courseRate->rate_comment = $rate_comment;
        if ($courseRate->save())
        {
                echo "<br> Added";
        }else
             {
            echo "Errore No Thing Is Added";
             }
    }
    public function updateRate($id_rate,$rate)
    {
        $courseRate= new CoursesRate();
       $result= $courseRate->find($id_rate);
        if($result != null){
           $result->rate = $rate;
           $result->save();
            echo "THe rate Is Modified";
       }else
       {
           echo "Error";
       }
    }
    public function deleteRate($id_rate)
    {
        $courseRate= new CoursesRate();
        $result= $courseRate->find($id_rate);
        if($result != null) {
            $result->delete();
            echo "The rate is deleted";
            return;
        }
        echo "Error : No Rates is Deleted";
    }


    public function getRateByCourseId($courseId)
    {
        $courseRate= new CoursesRate();
        $results= $courseRate->where('course_id',$courseId)
            ->get();
        foreach ($results as $everyCourseRate){
            echo "rate_id : ". $everyCourseRate->rate_id;
            echo "<br>";
            echo "student_id : ".$everyCourseRate->student_id;
            echo "<br>";
            echo "userName : ". $everyCourseRate->userName->username;
            echo "<br>";
            echo "course_id : ". $everyCourseRate->course_id;
            echo "<br>";
            echo "courseName : ". $everyCourseRate->courseName->course_name;
            echo "<br>";
            echo "rate : ". $everyCourseRate->rate;
            echo "<br>";
            echo "rate_comment : ". $everyCourseRate->rate_comment;
            echo "<br>";
        }
    }


    public function getAVGRateByCourseId($courseId)
    {  //aggregation to select avg rate

        $courseRate = new CoursesRate();
        $theAverage = $courseRate->where('course_id', $courseId)
            ->avg('rate');
        echo "The Average Of the Course Is : ". $theAverage;
    }

}