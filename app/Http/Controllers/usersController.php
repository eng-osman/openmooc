<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|min:3|max:30',
            'email'    => 'required|email',
            'password' => 'required|min:6',
            'gender'   => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
            return redirect()
                ->back()
                ->withErrors($validator);
    }

}