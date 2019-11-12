@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">All Posts</div>

        <div class="card-body">
             <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th colspan=2>Action</th>
                </thead>
                <tbody>
                    @if($posts->count() >0)
                        @foreach($posts as $post)
                          <tr>
                              <td>
                                  <img src="{{ asset($post->featured) }}" alt="{{$post->title}}" width="90px" height="50px">
                              </td>
                              <td>
                                  {{$post->title}}
                              </td>
                              <td>
                                  <a href="{{ route('post.edit',['id'=> $post->id ]) }}" class="btn btn-sm btn-info">Edit</a>
                              </td>
                              <td>
                              <a href="{{ route('post.delete',['id' => $post->id ])}}" class="btn btn-sm btn-warning">Trash</a>
                              </td>
                          </tr>
                        @endforeach
                    @else
                    <tr>
                        <th colspan=4 class="text-center">No published posts yet!</th>
                    </tr>
                    @endif
                </tbody>
             </table>
        </div>
    </div>
@endsection
