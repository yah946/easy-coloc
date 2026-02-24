<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }
    public function login(LoginRequest $request) {
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->intended('/profile')->with('success','Welcome back!');
        }
        return back()->with('error','Invalid Credientials');
    }
}
