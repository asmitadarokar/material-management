<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        // if(Auth::check() && Auth::user()->type=="admin"){
            return view('dashboard');
        // }
    }
}
