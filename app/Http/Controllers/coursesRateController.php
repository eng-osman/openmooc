<?php
/**
 * Created by PhpStorm.
 * User: Samar
 * Date: 4/4/2018
 * Time: 11:23 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesRateService;

class coursesRateController extends Controller
{
    public function addRate()
    {
        return view('addrate');
    }

    public function processaddRate(Request $request)
    {
        $rService = new coursesRateService();
        if($rService->addRate($request)){
            return 'rate added';
        }else{
            return $rService->errors();
        }
    }


    public function getRateByCourseId($id)
    {
        $rService = new coursesRateService();
        $rate = $rService->getRateByCourseId($id);
        return view('rate')->with('rate',$rate);
    }

    public function getrate($id)
    {
        $rService = new coursesRateService();
        $rate = $rService->getrate($id);
        return view('updaterate')->with('rate',$rate);
    }

    //update rate ( comment )
    public function updateRate(Request $request)
    {
        $rService = new coursesRateService();
        if($rService->updateRate($request)){
            return 'Rate Updated';
        }else{
            return $rService->errors();
        }
    }


    public function deleteRate($id)
    {
        $rService = new coursesRateService();
        if($rService->deleteRate($id)){
            return 'rate deleted';
        }else{
            return $rService->errors();
        }
    }

    // get Average rate
    public function getAVGRateByCourseId($id)
    {
        $rService = new coursesRateService();
        $rate = $rService->getAVGRateByCourseId($id);
        return view('avgrate')->with('rate',$rate);
    }
}