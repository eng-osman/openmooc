<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:21 PM
 */

namespace OpenMooc\Courses\Services;


use OpenMooc\Courses\Repositories\coursesRateRepository;
use OpenMooc\Service;
use Validator;
class coursesRateService extends Service
{
    public function addRate($request)
    {
        $rules = [
            'student_id'    => 'required|integer',
            'course_id'     => 'required|integer',
            'rate'          => 'required',
            'rate_comment'  => 'required|max:500'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $rRepository = new coursesRateRepository();
        if($rRepository->addRate($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function getrate($id)
    {
        $rRepository = new coursesRateRepository();
        $rate = $rRepository->getrate($id);
        if($rate){
            return $rate;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    public function getRates()
    {
        $rRepository = new coursesRateRepository();
        $rate = $rRepository->getRates();
        if($rate){
            return $rate;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    // get course rates by course id
    public function getRateByCourseId($id)
    {
        $rRepository = new coursesRateRepository();
        $rate = $rRepository->getRateByCourseId($id);
        if($rate){
            return $rate;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    //update rate ( comment )
    public function updateRate($request)
    {
        $rules = [
            'student_id'    => 'required|integer',
            'course_id'     => 'required|integer',
            'rate'          => 'required',
            'rate_comment'  => 'required|max:500'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        $rRepository = new coursesRateRepository();
        if($rRepository->updateRate($request->all())){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    //delete rate
    public function deleteRate($id)
    {
        $rRepository = new coursesRateRepository();
        if($rRepository->deleteRate($id)){
            return true;
        }else{
            $this->setError('Error');
            return false;
        }
    }

    // get Average rate
    public function getAVGRateByCourseId($id)
    {
        $rRepository = new coursesRateRepository();
        $avg = $rRepository->getAVGRateByCourseId($id);
        if($avg){
            return $avg;
        }else{
            $this->setError('Error');
            return false;
        }
    }

}