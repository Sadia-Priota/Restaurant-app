<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function List()
    {
        $data= Customer::all();
        return view('customer.list',["data"=>$data]);
      //  return view('customer.list',["customers"=>$customers]);
    }

    function customer(Request $req)
    {
        return $req->input();
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store()
    {
        return view('');

    }

    function editform()
    {
        return view('edit');
    }

    public function edit($id)
    {
        $data=Customer::find($id);
        return view('edit',['data'=>$data]);
    }
}
