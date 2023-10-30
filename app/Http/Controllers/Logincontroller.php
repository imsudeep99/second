<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Logincontroller extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        //validate data 
        $users = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // $users['role'] = 'admin';
        if (Auth::attempt($users)) {
            $request->session()->regenerate();
            //echo "HELLO";die;
            return redirect()->route('dashboard');
        }
        return redirect()->route('login');
        
    }
}
