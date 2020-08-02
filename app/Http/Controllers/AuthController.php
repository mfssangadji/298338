<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	return view(config('app.root').'.login');
    }

    public function loginpost(Request $request)
    {
    	if(Auth::attempt($request->only('email', 'password'))){
    		return redirect()->route('dashboard');
    	}

    	return redirect()->route('login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
