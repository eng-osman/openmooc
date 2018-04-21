<?php

namespace App\OpenMooc\Courses\Services;
use OpenMooc\Courses\Repositories\coursesRateRepositories;
use OpenMooc\Service;
use Validator;

class coursesRateServices extends  Service
{

    /**
     * add rate for courses
     * @param $request
     * @return bool
     */
    public function addRate($request)
    {
        $rules = [
            'student_id'    => 'required|integer',
            'course_id'     => 'required|integer',
            'rate'          => 'required|integer',
            'rate_comment'  => 'required|min:3|max:1000'
        ];
        //validation
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        $rateRepo = new coursesRateRepositories();
        if($rateRepo->addRates($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Adding');
            return false;
        }
    }


    /**
     * update rates
     * @param $request
     * @return bool
     */
    public function updateRateById($request)
    {
        $rules = [
            'student_id'    => 'required|integer',
            'course_id'     => 'required|integer',
            'rate'          => 'required|integer',
            'rate_comment'  => 'required|min:3|max:1000'
        ];
        //validation
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $rateRepo = new coursesRateRepositories();
        if($rateRepo->updateRateById($request->all()))
        {
            return true;
        }
        else
        {
            $this->setError('Error Updating');
            return false;
        }
    }


    /**
     * delete rate by id
     * @param $id
     * @return bool
     */
    public function deleteRate($id)
    {
        $rateRepo = new coursesRateRepositories();
        if($rateRepo->deleteRate($id))
        {
            return true;
        }
        else
        {
            $this->setError('Error Deleting');
            return false;
        }
    }

    /**
     * get average rate by course id
     * @param $id
     * @return bool
     */
    public function getRateByCourseId($id)
    {
        $rateRepo = new coursesRateRepositories();
        $rate = $rateRepo->getRateByCourseId($id);
        if($rate)
        {
            return $rate;
        }
        else
        {
            $this->setError('Error Retrieving Data');
            return false;
        }
    }

    /**
     * get average for every course
     * @param $id
     * @return bool|mixed
     */
    public function getAVGRateByCourseId($id)
    {
        $rRepository = new coursesRateRepositories();
        $avg = $rRepository->getAVGRateByCourseId($id);
        if($avg)
        {
            return $avg;
        }
        else
        {
            $this->setError('Error Retrieving Data');
            return false;
        }
    }

}