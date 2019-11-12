@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-hover">
                           <thead>
                               <th>Image</th>
                               <th>Title</th>
                               <th>Action</th>
                           </thead>
                           <tbody>
                               @if($posts->count() >0)
                                   @foreach($posts as $post)
                                     <tr>
                                         <td>
                                            <img src="{{ asset($post->featured) }}" alt="{{$post->title}}" width="90px" height="50px">
                                         </td>
                                         <td>
                                             <a href="{{route('post.show',['id'=> $post->id])}}">{{$post->title}}</a>
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
        </div>
    </div>
</div>
@endsection
