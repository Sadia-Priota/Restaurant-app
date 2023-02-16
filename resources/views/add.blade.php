@extends('layout')

@section('content')
    <div class="col-sm-6">
        <form method="post" action="{{ route('resto_insert') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email id</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputAdd1">Address</label>
                <input type="text" class="form-control" id="exampleInputAdd1" name="address" placeholder="Enter address">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
