@extends('layouts.app')
@section('content')


<div class="card">
    <div class="card-header">
        Edit Post: {{ $post->title }}
    </div>
    <div class="card-body">
        @include('admin.inc.error')
        <form action="{{route('post.update',['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">    
            </div>    
            <div class="form-group">
                <label for="content">Content</label>
            <textarea name="content" id="article" cols="5" rows="5" class="form-control">{!! $post->content !!}</textarea>
            </div>
            <div class="form-group">
                    <label for="category">Select a category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($post->category_id == $category->id)
                                    selected
                                @endif
                                >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <label for="featured">Featured image</label>
                <input type="file" name="featured" class="form-control-file">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </div>
            </form>
    </div>
</div>




@endsection