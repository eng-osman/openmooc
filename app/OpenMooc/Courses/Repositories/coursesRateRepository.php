<?php

namespace OpenMooc\Courses\Repositories;


use OpenMooc\Courses\Models\CoursesRate;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class coursesRateRepository extends Repository
{
    //add rate
    public function addRate($rateData)
    {
        $rates = new CoursesRate();
        $rates->student_id   = $rateData['student_id'];
        $rates->course_id    = $rateData['course_id'];
        $rates->rate         = $rateData['rate'];
        $rates->rate_comment = $rateData['rate_comment'];
        if($rates->save()){
            return true;
        }else{
            return false;
        }
    }

    //get rate by id
    public function getrate($id)
    {
        return CoursesRate::find($id);
    }

    // get course rates by course id
    public function getRateByCourseId($id)
    {
        $rate = DB::table('courses_rate')
            ->where('course_id','=',$id)
            ->get();
        if(count($rate)>0)
           return $rate;
    }

    //update rate ( comment )
    public function updateRate($Data)
    {
        $rate = CoursesRate::find($Data['id']);
        $rate->rate = $Data['rate'];
        $rate->rate_comment = $Data['rate_comment'];
        if($rate->save()){
            return true;
        }else{
            return false;
        }
    }

    //delete rate
    public function deleteRate($id)
    {
        $rate = CoursesRate::find($id);
        if(!$rate){
            return 'rate not found';
        }else{
            $rate->delete();
            return true;
        }
    }

    // get Average rate
    public function getAVGRateByCourseId($CourseId)
    {
        $avg = DB::table('courses_rate')
                   ->where('course_id', $CourseId)
                   ->avg('rate');
        return $avg;
    }
}