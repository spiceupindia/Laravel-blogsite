@extends('layouts.app')
@section('content')
    <div class="container my-5">
            <h1 class="text-center">About Page</h1>
            @if(count($users) > 0)
                @foreach($users as $user)
                    <h4>welcome {{$user->name}}</h4>
                @endforeach
            @else
                <p>No Users Registered</p>
            @endif
    </div>
@endsection