@extends('layouts.app')
@section('content')

        <div class="card">
            <div class="card-header">Create Category</div>

            <div class="card-body">
                 @include('admin.inc.error')
                <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control">    
                </div>    
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store Category</button>
                    </div>
                </div>
                </form>
            </div>   
    </div>





@endsection