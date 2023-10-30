<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class Changepasswordcontroller extends Controller
{
    public function index_pass()
    {
        
        return view('change_password.index');
    }
    public function update_pass(Request $request){
        $request->validate([
           'current_password' => 'required',
           'new_password' => 'required|confirmed|min:6',
        ]);
        if (Hash::check($request->current_password,auth()->user()->password)) {
            auth()->user()->update(['password'=> Hash::make($request->new_password)]);
            return redirect()->route('dashboard')->with('success', 'Pasword changed successfully');
        }else{
            return redirect()->back()->withErrors(['msg' => 'Current password is incorrect']);
        }
       }
}
