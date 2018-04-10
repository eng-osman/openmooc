<?php

namespace OpenMooc\Courses\Services;

use OpenMooc\Courses\Repositories\coursesRepository;
use OpenMooc\Service;
use Validator;
class coursesService extends Service
{

    public  function createCourse($request)
    {
        $rules = [
            'title'       => 'required|min:5|max:20',
            'description' => 'required',
            'category'    => 'required',
            'active'      => 'required',
            'instructor'  => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }

        //store
        $courses = new coursesRepository();
        if ($courses->createCourse($request->all()))
            return true;

        $this->setError('Error saving in DB');
        return false;

    }
}