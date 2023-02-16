<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use Illuminate\Http\Request;

use App\Restaurant;
use App\Http\Controllers\Restos;
use App\Http\Controllers\Session;

class restoController extends Controller
{
    function index()
    {
        return view('home');
    }

    function list()
    {
        $data= Resto::all();
        return view('List',["data"=>$data]);
    }

    function add(Request $req)
    {

        $validation_date = validator(request()->all(),[
            'name'  => ['required'],
            'email'  => ['required','string'],
            'address'  => ['required','string'],
    ])->validate();

        $data['name'] = $validation_date['name'];
        $data['email'] = $validation_date['email'];
        $data['address'] = $validation_date['address'];
        $resto_create = Resto::create($data);




//        $resto = new Resto();
//        $resto->name=$validation_date['name'];
//        $resto->email=$validation_date['email'];
//        $resto->contact=$validation_date['contact'];
//        $resto->optional_contact=$validation_date['optional_contact'];
//        $resto->address=$validation_date['address'];
//        $resto->save();

       // return redirect()->route('resto_insert');
        $req->session()->flash('status','Restaurant entered successfully');
        return redirect('list');
    }

    function userCreate()
    {
        return view('user');
    }
function user(Request $req)
    {
        return $req->input();
    }

    function delete($id)
    {
        Resto::find($id)->delete();
       // $id->Session::flash('status','Restaurant has been deleted');
        return redirect('list');
    }

    function editform()
    {
        return view('edit');
    }
    function edit($id)
    {
//       Resto::find($id);
//       return view('edit');
//       return "qqqqqq";
//        return Resto::find($id);
        $data = Resto::find($id);
        return view('edit',['data'=>$data]);
    }

    function editSave($id)
    {
        $id->save();
        return view('list');
    }


}
