@extends('layout')

@section('content')
    <div class="col-sm-6">
        <form method="post" action="{{ route('customer.store') }}">
            @csrf

            <div class="form-group">
                <label for="exampleInputName">Customer Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="exampleInputAddress">Address</label>
                <input type="string" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label for="exampleInputContact">Contact No.</label>
                <input type="number" class="form-control" id="exampleInputContact" name="contact" placeholder="Enter Phone no">
            </div>

            <div class="form-group">
                <label for="exampleInputStatus">Status</label>
                <input type="number" class="form-control" id="exampleInputStatus" name="status" placeholder="Enter Status">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
