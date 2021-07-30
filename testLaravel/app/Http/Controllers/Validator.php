<?php

namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

$rules = array(
            'pseudo'             => 'required',
            'email'            => 'required|email|unique:ducks',
            'password'         => 'required',
            'password_confirm' => 'required|same:password'
        );
    
        $validator = Validator::make($request->all(),[
            'password_confirm'=> 'required|same:password|max:32'
        ]);
    
        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('index')
                ->withErrors($validator);
        }