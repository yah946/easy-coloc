<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }
    public function ban(User $user){
        $user->delete();
        return back()->with('success',$user->name.' is banned');
    }
    public function OnlyBannedUsers(User $user){
        $users = User::onlyTrashed()->get();
        return view('admin.blocked-list',compact('users'));
    }
    public function deban(User $user){
        $user->restore();
        return back()->with('success',$user->name.' is banned');
    }
}
