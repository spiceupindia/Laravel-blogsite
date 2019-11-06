@extends('layouts.app')
@section('content')

        <div class="card">
            <div class="card-header">Update Category</div>

            <div class="card-body">
                 @include('admin.inc.error')
                <form action="{{route('category.update',['id' => $category->id ])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" value={{$category->name}} class="form-control">    
                </div>    
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Category</button>
                    </div>
                </div>
                </form>
            </div>   
    </div>
@endsection