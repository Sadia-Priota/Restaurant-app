@extends('layout')

@section('content')
    <div class="col-sm-6">
        <h1>Edit Restaurant</h1>
        <form method="post" action="{{ route('resto_edit_save') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" value="{{ $data->name }}" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Email id</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email" value="{{ $data->email }}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="exampleInputAddress" name="address" value="{{ $data->address }}" placeholder="Enter address">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
