@extends('layout')

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Status</th>
            <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $cus)
            <tr>
                <th scope="row">{{$cus->id}}</th>
                <td>{{$cus->name}}</td>
                <td>{{$cus->address}}</td>
                <td>{{$cus->contact}}</td>
                <td>{{$cus->status}}</td>
                <td>
                    <a href="/edit/{{$cus->id}}">
                    <button type="button" class="btn btn-outline-success">Edit</button>
                    </a>

                    <a href="/delete/{{$cus->id}}">
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

{{--    <h1>pppp</h1>--}}
@stop
