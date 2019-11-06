@extends('layouts.app')
@section('content')

        <div class="card">
            <div class="card-header">Create Tags</div>

            <div class="card-body">
                 @include('admin.inc.error')
                <form action="{{route('tag.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tag">Tag Name</label>
                        <input type="text" name="tag" class="form-control">    
                    </div>    
                    
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Store Tag</button>
                        </div>
                    </div>
                </form>
            </div>   
    </div>





@endsection