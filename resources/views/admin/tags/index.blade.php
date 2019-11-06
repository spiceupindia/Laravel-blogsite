@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">All Tags</div>

        <div class="card-body">
             <table class="table table-hover">
                <thead>
                    <th>Tag Name</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    @if($tags->count() >0)
                        @foreach($tags as $tag)
                          <tr>
                              <td>
                                  {{$tag->tag}}
                              </td>
                              <td>
                                    <a href="{{route('tag.edit',['id' => $tag->id])}}" class="btn btn-info btn-sm">Edit</a>
                              </td>
                              <td>
                                    <a href="{{route('tag.delete',['id' => $tag->id])}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                        @else
                        <tr>
                            <th colspan=2 class="text-center">No Tags yet!</th>
                        </tr>
                    @endif
                </tbody>
             </table>
            </div>
        </div>
@endsection