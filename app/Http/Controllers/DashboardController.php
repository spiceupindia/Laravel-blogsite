<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $posts = User::find(Auth::id())->posts;
        return view('dashboard')->with('posts',$posts);
    }
}
