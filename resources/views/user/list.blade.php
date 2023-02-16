@extends('layout')

@section('content')
    <h1>Restaurant page is here</h1>

    @if(Session :: get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('status')}}
            Restaurant entered successfully!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach($user->userPhones as $user_phone)
                        {{ $user_phone->phone_number }}<br>
                    @endforeach
                </td>
                <td>
                    <a href="/delete/{{$user->id}}">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="/edit/{{$user->id}}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
