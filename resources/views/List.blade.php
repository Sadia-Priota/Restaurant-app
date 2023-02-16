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
{{--    {{print_r($data)}}--}}
{{--    @foreach($data as $item)--}}
{{--        <p>{{$item->name}}</p>--}}
{{--    @endforeach--}}

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th>Operation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>
                <a href="/delete/{{$item->id}}">
                    <i class="fa fa-trash"></i>
                </a>
                <a href="{{ route('resto_edit', ['id' => $item->id]) }}">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop
