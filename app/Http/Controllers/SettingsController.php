<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

   public function index(){
       return view('admin.settings.settings')->with('settings', Setting::first());
   }

   public function update(){
       $this->validate(request(),[
        'site_name' => 'required',
        'contact_number' => 'required',
        'contact_email' => 'required',
        'address' => 'required'
       ]);

       $settings = Setting::first();

      /* $settings->site_name = request()->site_name;
       $settings->contact_number = request()->contact_number;
       $settings->contact_email = request()->contact_email;
       $settings->address = request()->address;

       $settings->save(); */

       $settings->fill($request->input())->save();

       Session::flash('success', 'Settings Updated successfully');

       return redirect()->back();

    }


}
