<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        $cards = Card::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('dashboard', compact('cards'));
    }

    public function pass_change(){
        return view('pass_change');
    }

    public function allUsers(){
        $users = User::where('isAdmin',0)->orderBy('id', 'DESC')->get();
        return view('admin.all_users',compact('users'));
    }

    public function deleteUser($id = null){
        $user = User::find($id);
        $user->delete();
        $notify[] = ['error','User Deleted Success!'];
        return back()->withNotify($notify);
    }
}
