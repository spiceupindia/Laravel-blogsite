@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">{{$title}}</h1>
        <ul class="list-group">
            @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    </div>
@endsection