<?php

namespace App\Http\Controllers;

use App\Models\Card;
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
}
