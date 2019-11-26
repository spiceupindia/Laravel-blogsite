@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">

      <h5 class="card-title">Show Details: {{ $post->title }}</h5>
      <img src="{{ asset('uploads/posts/'.$post->featured_image) }}" alt="{{ $post->title }}" height="250px" width="100%">
      <p class="card-text">{!! $post->content !!}</p>
      <p>Category: {{ $post->category->name }}</p>
      <p>Created By: {{ $post->user->name }}</p>
      <div class="d-flex justify-content-between">
            <a href="{{ route('posts.edit',['id' => $post->id ])}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
            <form action="{{ route('posts.destroy',['id' => $post->id ])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>
      </div>


    </div>
  </div>


@endsection
