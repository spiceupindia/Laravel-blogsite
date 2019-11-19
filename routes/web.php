<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}
Route::get('/', [
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);

Route::get('/categorys/{category}',[
    'uses' => 'FrontendController@category',
    'as' => 'category.single'
]);

Route::get('/post/{slug}',[
    'uses' => 'FrontendController@single_post',
    'as' => 'post.single'
]);

Route::get('/tags/{id}',[
    'uses' => 'FrontendController@tag',
    'as' => 'tag.single'
]);


Route::get('/results', [
    'uses' => 'FrontendController@search',
    'as' => 'search.results'
]);

Route::post('/subscribe',[
    'uses' => 'FrontendController@subscribe',
    'as' => 'subscribe'
]);

// Route::get('/user',function(){
//     return '<h2>Welcome</h2>';
// });

// //dynamic routing
// Route::get('/user/{name}/{age}',function($name,$age){
//     // return "Welcome $name";
//     //return 'welcome '.$name;
//     return 'User '.$name. ' Age '.$age;
// });

Route::get('/index','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard','DashboardController@index')->name('dashboard');

//one-one relationship user->profile
Route::get('/test/profile',function(){
    return App\User::find(1)->profile;
});
Route::get('/test/user',function(){
    return App\Profile::find(2)->user;
});

//one-many relationship category->posts
Route::get('/test/category', function(){
    return App\Post::find(1)->category;
});
Route::get('/test/posts', function(){
    return App\Category::find(1)->posts;
});

//one-many relationship user->posts
Route::get('/test/user/posts', function(){
    return App\User::find(1)->posts;
});
Route::get('/test/posts/user', function(){
    return App\Post::find(1)->user;
});

//many-many relationship posts->tags
Route::get('/test/posts/tags', function(){
    return App\Post::find(2)->tags;
});

Route::get('/test/tags/posts', function(){
    return App\Tag::find(2)->posts;
});

//Route::resource('posts','PostsController');


Route::group(['middleware' => 'auth'], function(){

    Route::get('/posts/create',[
        'uses' => 'PostsController@create',
        'as' => 'posts.create'
    ]);
    Route::post('/posts/store',[
        'uses' => 'PostsController@store',
        'as' => 'posts.store'
    ]);

    Route::get('/posts',[
        'uses' => 'PostsController@index',
        'as' => 'posts.index'
    ]);

    Route::get('/post/show/{post}',[
        'uses' => 'PostsController@show',
        'as' => 'post.show'
    ]);

    Route::get('/posts/edit/{post}',[
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);
    Route::post('/posts/update/{post}',[
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);
    Route::get('/posts/delete/{post}',[
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);
    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);
    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'category.index'
    ]);
    Route::get('/category/edit/{category}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);
    Route::post('/category/update/{category}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);
    Route::get('/category/delete/{category}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    Route::get('/posts/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('post/kill/{id}',[
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('tag/create',[
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('tag/store',[
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('tag/edit/{tag}',[
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('tag/update/{tag}',[
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('tag/index',[
        'uses' => 'TagsController@index',
        'as' => 'tags.index'
    ]);

    Route::get('tag/delete/{tag}',[
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('/user/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/user/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);


    Route::get('/user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not-admin'
    ]);

    Route::get('/user/delete/{user}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'setting.index'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'setting.update'
    ]);





});

