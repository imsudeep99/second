<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class Registercontroller extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function registration(Request $request){
        $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required|min:6',
           
       ]);
       //dd( $request->password);
       $user = new user();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make ($request->password);
       $save = $user->save();
       if($save){
           //return ('success');
           return redirect()->route('login');
       }else{
           return ('failed');
       }
       }
}
