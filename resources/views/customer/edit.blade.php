@extends('layout')

@section('content')
    <div class="col-sm-6">
        <h1>Edit Customer's Details</h1>
        <form method="post" action="{{ route('customer_edit_save') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" value="{{ $data->name }}" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="exampleInputAddress" name="address" value="{{ $data->address }}" placeholder="Enter address">
            </div>

            <div class="form-group">
                <label>Contact</label>
                <input type="number" class="form-control" id="exampleInputContact" name="contact" value="{{ $data->contact}}" placeholder="Enter Phone no">
            </div>

            <div class="form-group">
                <label>Status</label>
                <input type="number" class="form-control" id="exampleInputStatus" name="status" value="{{ $data->status }}" placeholder="Enter status">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
