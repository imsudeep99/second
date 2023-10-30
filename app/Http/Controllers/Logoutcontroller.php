<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Logoutcontroller extends Controller
{
    public function index(){
        // echo "logout";
        // return view('logout.index');
        return redirect('login')->with(Auth::logout());
     }
}
