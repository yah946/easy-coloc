<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EditProfileRequest;
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
}
