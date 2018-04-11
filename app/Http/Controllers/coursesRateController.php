<?php
/**
 * Created by PhpStorm.
 * User: masne
 * Date: 11/04/2018
 * Time: 02:04 ص
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use OpenMooc\Courses\Services\coursesRateService;

class coursesRateController extends Controller
{
    public function addCourseRat (){

        $courseRateService = new coursesRateService();
       return $courseRateService->addRate(4,6,20,"Every thing Is Ok");
    }


    public function updateCourseRat (){
        $courseRateService = new coursesRateService();
        return $courseRateService->updateRate(4,30);

    }
    public function deleteCourseRat (){
        $courseRateService = new coursesRateService();
        return $courseRateService->deleteRate(5);
    }

    public function getRateByCourseId (){
        $courseRateService = new coursesRateService();
        return $courseRateService->getRateByCourseId(6);
    }

    public function getAVGRateByCourseId (){
        $courseRateService = new coursesRateService();
        return $courseRateService->getAVGRateByCourseId(6);
    }
}