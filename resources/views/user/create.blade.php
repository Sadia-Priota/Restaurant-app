@extends('layout')

@section('content')
    <div class="col-sm-6">
        <form method="post" action="{{ route('user.store') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputId">User Name</label>
                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email id</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPhone1">Contact No.</label>
                <input type="number" class="form-control" id="exampleInputPhone1" name="contact" placeholder="Enter Phone no">
            </div>

            <div class="form-group">
                <label for="exampleInputOptionalPhone1">Optional Contact No.</label>
                <input type="number" class="form-control" id="exampleInputOptionalPhone1" name="optional_contact" placeholder="Enter Another Phone no">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
