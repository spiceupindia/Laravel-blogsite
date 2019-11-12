<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{ secure_asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       @include('admin.inc.navbar')
       <div class="container py-4">
            {{-- @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('info'))
                <div class="alert alert-info">
                    {{ session()->get('info') }}
                </div>
        @endif        --}}
            <div class="row justify-content-center">

                @if(Auth::check())

                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="{{ route('category.create') }}">Create Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('category.index') }}">All Categories</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="{{ route('tag.create') }}">Create Tag</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="{{ route('tags.index') }}">All Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.create') }}">Create Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.index') }}">All Posts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('posts.trashed') }}">All Trashed Posts</a>
                            </li>



                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('users') }}">Users</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">Add User</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('user.profile') }}">My Profile</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('setting.index') }}">Settings</a>
                                </li>
                            @endif

                        </ul>
                    </div>

                @endif

                <div class="col-lg-8">
                        @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!--scripts -->
    <script src="/js/app.js"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article' );
    </script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
</body>
</html>
