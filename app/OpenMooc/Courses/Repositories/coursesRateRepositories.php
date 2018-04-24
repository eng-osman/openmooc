<?php

namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\CoursesRate;
use OpenMooc\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class coursesRateRepositories extends  Repository
{

    /**
     * add rate
     * @param $Data
     * @return bool
     */
    public function addRates($Data)
    {
        $rates = new CoursesRate();
        $rates->student_id    = $Data['student_id'];
        $rates->course_id     = $Data['course_id'];
        $rates->rate          = $Data['rate'];
        $rates->rate_comment  = $Data['rate_comment'];

        //store
        if($rates->save())
            return true;
        else
            return false;

    }

    /**
     * update rate by id
     * @param $Data
     * @return bool
     */
    public function updateRateById($Data)
    {
        $rate               = CoursesRate::find($Data['id']);
        $rate->rate         = $Data['rate'];
        $rate->rate_comment = $Data['rate_comment'];

        // sotre
        if($rate->save())
            return true;
        else
            return false;

    }

    /**
     * delete rate
     * @param $id
     * @return bool|string
     * @throws \Exception
     */
    public function deleteRate($id)
    {
        $rate = CoursesRate::find($id);
        if(!$rate)
        {
            return 'this rate is not found or deleted';
        }
        else
        {
            $rate->delete();
            return true;
        }
    }

    /**
     * get all rates
     * @return mixed
     */
    public function getAllRates()
    {
        $rate = DB::table('courses_rate')
            ->leftJoin('courses', 'courses_rate.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_rate.student_id', '=', 'users.id')
            ->select('courses_rate.*','courses.course_name','users.name')
            ->get();
        if(count($rate) > 0)
            return $rate;
        else
            return false;
    }

    /**
     * get Rate By Course Id
     * @param $id
     * @return mixed
     */
    public function getRateByCourseId($id)
    {
        $rate = DB::table('courses_rate')->where('course_id',$id)->get();
        if(count($rate)> 0 )
            return $rate;
        else
            return false;
    }

    /**
     * get average rate by course id
     * @param $CourseId
     * @return mixed
     */
    public function getAVGRateByCourseId($id)
    {
        $avg = DB::table('courses_rate')->where('course_id', $id)->avg('rate');

        if(count($avg) > 0)
            return $avg;
        else
            return false;
    }

}