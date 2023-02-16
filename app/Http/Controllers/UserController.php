<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use App\Models\UserPhone;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validation_date = validator(request()->all(),[
            'name'  => ['required'],
            'email'  => ['required'],
            'contact'  => ['required'],
            'optional_contact'  => ['required'],
            'password'  => ['required'],
        ])->validate();

        $data['name'] = $validation_date['name'];
        $data['email'] = $validation_date['email'];
        $data['password'] = $validation_date['password'];
         $user_create = \App\Models\User::create($data);

        $phone1['phone_number'] = $validation_date['contact'];
        $phone1['user_id'] = $user_create->id;
        UserPhone::create($phone1);

        $phone2['phone_number'] = $validation_date['optional_contact'];
        $phone2['user_id'] = $user_create->id;
        UserPhone::create($phone2);

    }

    function list()
    {
      return  $userPhone= UserPhone::with('user')->get();
         $users= \App\Models\User::with('userPhones')->get();
        return view('user.list',["users"=>$users]);
    }
}
