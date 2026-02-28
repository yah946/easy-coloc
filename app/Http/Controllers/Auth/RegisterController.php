<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    public function register(RegisterRequest $request) {
        DB::transaction(function()use($request){
            $user=User::find(1);
            if($user){
                User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$request->password,
                ]);
            }else{
                User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$request->password,
                ])->assignRole('admin');
            }
        });
        return redirect()->intended('/profile')->with('success','Your account has been successfully created!');
    }
}