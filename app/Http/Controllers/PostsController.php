<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0){

            Session::flash('info', 'You must have some categories and tags before attempting to create post');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:6',
            'content' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required',
        ]);


        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        Storage::disk('public')->put($featured_new_name, file_get_contents($featured));


        $user_id = Auth::id();

        //Mass Assignment
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => secure_asset('storage/'.$featured_new_name),
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => $user_id
        ]);

        $post->tags()->attach($request->tags);

        $post->save();

        Session::flash('success', 'Post Created Successfully');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit')->with('post',$post)
                                        ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required|min:3',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time(). $featured->getClientOriginalName();
            Storage::disk('public')->put($featured_new_name, file_get_contents($featured));
            $post->featured = secure_asset('storage/'.$featured_new_name);
        }

       /* $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();*/
        $post->fill($request->input())->save();

        Session::flash('success', 'Post updated successfully.');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('success', 'Post deleted successfully.');
        return redirect()->route('posts.index');

    }

    public function trashed() {

        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);

    }

    public function restore($id){

        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfully.');

        return redirect()->route('posts.index');

    }


    public function kill($id){

        $post = Post::withTrashed()->where('id', $id)->first();

        Storage::disk('public')->delete($post->featured);

        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently.');

        return redirect()->route('posts.index');

    }


}
