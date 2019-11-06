@extends('layouts.app')
@section('content')

        <div class="card">
            <div class="card-header">Edit Tag</div>

            <div class="card-body">
                 @include('admin.inc.error')
                <form action="{{route('tag.update',['id' => $tag->id ])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tag">Tag Name</label>
                        <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">    
                    </div>    
                    
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Tag</button>
                        </div>
                    </div>
                </form>
            </div>   
    </div>





@endsection