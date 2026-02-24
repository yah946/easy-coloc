<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\EditProfileRequest;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        return view('auth.profile');
    }
    public function update(EditProfileRequest $request){
        Auth::user()->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        return back()->with('success','Name and Email Has been updated!');
    }
    public function changePassword(ChangePasswordRequest $request){
        $user = Auth::user();
        if(Hash::check($request->password,$user->password)){
            return back()->with('error','invalid old password or new and old password are same!');
        }
        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        return back()->with('success','Password Has Been Changed!');
    }
}
