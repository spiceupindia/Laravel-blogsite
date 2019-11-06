@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header"> <b>{{$post->title}}</b></div>

        <div class="card-body">
             <table class="table table-hover">
                
                          <tr>
                              <td class="text-center">
                                  <img class="rounded mx-auto d-block" src="{{ $post->featured }}" alt="{{$post->title}}" width="100%" height="250px">
                              </td>
                          </tr>
                          <tr>
                                <td>
                                    {!!$post->content!!}
                                </td> 
                            </tr>   
        
                             <tr>
                                <td>
                                    <a href="{{ route('post.edit',['id'=> $post->id ]) }}" class="btn btn-sm btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('post.delete',['id' => $post->id ])}}" class="btn btn-sm btn-warning">Trash</a>
                                </td>
                          </tr>                  
             </table>
        </div>
    </div>
@endsection