<?php

namespace App\Http\Controllers;

use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RechargeController extends Controller
{

    public function recharge(){
        $recharge = Recharge::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('recharge');
    }

    public function newRecharge(Request $request)
    {
        $request->validate([
            'method'    => 'required',
            'number'    => 'required',
            'trx'       => 'required',
            'amount'    => 'required|numeric',
        ]);
        // $recharge = Recharge::where('id', $request->id)->first();
        $recharge           = new Recharge();
        $recharge->user_id  = Auth::user()->id;
        $recharge->method   = $request->method;
        $recharge->number   = $request->number;
        $recharge->trx      = $request->trx;
        $recharge->amount   = $request->amount;
        $recharge->status   = 2;
        $recharge->save();

        return response()->json(['msg'=>'Recharge Request Send to Admin.','cls'=>'success']);
    }

    public function getRechargeHistory(){
        $recharge = Recharge::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return response()->json(['cls'=>'success', 'data'=>$recharge]);
    }




}
