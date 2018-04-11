<?php
/**
 * Created by PhpStorm.
 * User: masne
 * Date: 11/04/2018
 * Time: 01:44 ص
 */

namespace OpenMooc\Courses\Services;
use OpenMooc\Courses\Repositories\coursesRateRepository;
use OpenMooc\Service;

class coursesRateService extends Service
{
    public function addRate($student_id,$cours_id,$rat,$rate_comment){
        if ($student_id != null && $cours_id != null ) {
            $coursesRateRepository = new coursesRateRepository();
            return $coursesRateRepository->addRate($student_id, $cours_id, $rat, $rate_comment);
        }
        echo "WWrong Enteries";
    /**
     * Update rate By id
     */
    }
    public function updateRate ($id_rate,$rate){
        $coursesRateRepository= new coursesRateRepository();
        if($id_rate != null) {
            return $coursesRateRepository->updateRate($id_rate, $rate);
            }
        echo "You must Enter the rate Id";
    }

    public function deleteRate ($id_rate){
        $coursesRateRepository= new coursesRateRepository();
        if($id_rate != null) {
            return $coursesRateRepository->deleteRate($id_rate);
        }
        echo "You must Enter the rate Id";
    }
    public function getRateByCourseId ($course_id)
    {
        $coursesRateRepository = new coursesRateRepository();
        if ($course_id != null) {
            return $coursesRateRepository->getRateByCourseId($course_id);
        }
        echo "You must Enter the rate Id";
    }

    public function getAVGRateByCourseId ($course_id)
    {
        $coursesRateRepository = new coursesRateRepository();
        if ($course_id != null) {
            return $coursesRateRepository->getAVGRateByCourseId($course_id);
        }
        echo "You must Enter the rate Id";
    }

}