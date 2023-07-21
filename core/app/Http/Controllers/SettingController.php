<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function control(){
        $control = Setting::first();
        return view('admin.control', compact('control'));
    }

    public function controlUpdate(Request $request){
        $reqKey = '';
        foreach ($request->all() as $key => $value) {
            $reqKey = $key;
        }
        $control = Setting::first();
        $control->$reqKey = $request->$reqKey;
        $control->save();
        return response()->json(['msg'=>ucwords(str_replace('_',' ',$reqKey)).' Updated Successfully!','cls'=>'success']);
    }

    public function pendingRecharge(){
        $recharge = Recharge::where('status', 2)->orderBy('id', 'DESC')->get();
        return view('admin.pending_recharge', compact('recharge'));
    }

    //accpet recharge
    public function accpetRecharge(Request $request){
        $request->validate([
            'id'=>'required',
        ]);
        $recharge = Recharge::where('id', $request->id)->where('status', 2)->first();
        $user = User::where('id', $recharge->user_id)->first();

        $user->balance += $recharge->amount;
        $user->save();

        $recharge->status = 1;
        $recharge->save();

        return response()->json(['msg'=>'Recharge Accepted Successfully!','cls'=>'success']);
    }

    //cancel recharge
    public function cancelRecharge(Request $request){
        $request->validate([
            'id'=>'required',
        ]);
        $recharge = Recharge::where('id', $request->id)->where('status', 2)->first();
        $recharge->status = 0;
        $recharge->save();

        return response()->json(['msg'=>'Recharge Rejected!','cls'=>'error']);
    }

    // recharge notify
    public function rechargeNotify(){
        $recharge = Recharge::where('status', 2)->orderBy('id', 'DESC')->get();
        $rechargeCount = Recharge::where('status', 2)->count();
        return response()->json(['cls'=>'success', 'count'=>$rechargeCount, 'data'=>$recharge]);
    }

    public function addBalance(Request $request){
        // dd($request->all());
        $user = User::find($request->user_id);
        $user->balance += $request->balance;
        $user->save();
        $notify[] = ['success',$request->balance.' Taka Add to '.$user->name];
        return back()->withNotify($notify);
    }

    public function setCost(Request $request){
        // dd($request->all());
        $user = User::find($request->user_id);
        $user->cost = $request->balance;
        $user->save();
        $notify[] = ['success','Set cost '.$request->balance.' Taka for '.$user->name];
        return back()->withNotify($notify);
    }

    public function setCostAll(Request $request){
        $users = User::where('isAdmin', '=', '0')->get();
        foreach ($users as $user) {
            $user->cost = $request->balance;
            $user->save();
        }
        $notify[] = ['success','Set cost '.$request->balance.' Taka for all Users'];
        return back()->withNotify($notify);
    }

}
