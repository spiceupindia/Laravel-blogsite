<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index(){
        $title = "Index Page";
        return view('pages.index')->with('title',$title);
    }

    public function about(){ 
        $users = User::all();  
        return view('pages.about')->with('users',$users);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Programming','Deployment','Hosting']
        );
        return view('pages.services')->with($data);
    }
}
