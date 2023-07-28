<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CardController extends Controller
{
    public function newCard()
    {
        return view('new_card');
    }

    //make new card store
    public function newCardStore(Request $request)
    {
        $request->validate([
            'certificate_no'   => ['required','unique:'.Card::class],
            'type'             => 'required',
            'nationality'      => 'required',
            'name'             => 'required',
            'dob'              => 'required',
            'gender'           => 'required',
            'vaccin_center'    => 'required',
            'vaccin_by'        => 'required',
            'total_dose'       => 'required',
        ]);

        $user = auth()->user();
        if ($user->balance < $user->cost) {
            $msg = "আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নেই দয়া করে রিচার্জ করুন!";
            return response()->json(['msg'=>$msg, 'cls'=>'error']);
        }
        $user->balance -= $user->cost;
        $user->save();

        $card = new Card();
        $card->user_id          = auth()->user()->id;
        $card->certificate_no   = $request->certificate_no;
        $card->type             = $request->type;
        $card->nid_no           = $request->nid_no;
        $card->birth_no         = $request->birth_no;
        $card->passport_no      = $request->passport_no;
        $card->nationality      = $request->nationality;
        $card->name             = $request->name;
        $card->dob              = date_create($request->dob);
        $card->gender           = $request->gender;
        $card->dose1date        = date_create($request->dose1date);
        $card->dose1name        = $request->dose1name;
        $card->dose2date        = date_create($request->dose2date);
        $card->dose2name        = $request->dose2name;
        $card->dose3date        = date_create($request->dose3date);
        $card->dose3name        = $request->dose3name;
        $card->vaccin_center    = $request->vaccin_center;
        $card->vaccin_by        = $request->vaccin_by;
        $card->total_dose       = $request->total_dose;
        $card->save();

        $msg = "New card added successfully!";
        return response()->json(['msg'=>$msg, 'cls'=>'success']);
    }

    public function cardEdit($id = null)
    {
        $id = Crypt::decryptString($id);
        $card = Card::find($id);
        return view('card_update', compact('card'));
    }

    public function cardUpdate(Request $request, $id = null)
    {
        $request->validate([
            // 'certificate_no'   => ['required','unique:'.Card::class],
            'type'             => 'required',
            'nationality'      => 'required',
            'name'             => 'required',
            'dob'              => 'required|date',
            'dose1date'        => 'nullable|date',
            'dose2date'        => 'nullable|date',
            'dose3date'        => 'nullable|date',
            'gender'           => 'required',
            'vaccin_center'    => 'required',
            'vaccin_by'        => 'required',
            'total_dose'       => 'required',
        ]);
        

        $id = Crypt::decryptString($id);

        $card = Card::find($id);

        $control = Setting::first();
        $user = User::find($card->user_id);

        if ($user->balance < $control->charge_update) {
            $msg = "আপনার পর্যাপ্ত পরিমাণ ব্যালেন্স নেই দয়া করে রিচার্জ করুন!";
            return response()->json(['msg'=>$msg, 'cls'=>'error']);
        }
        $user->balance -= $control->charge_update;
        $user->save();


        // $card->user_id          = $card->user_id;
        // $card->certificate_no   = $request->certificate_no;
        $card->type             = $request->type;
        $card->nid_no           = $request->nid_no;
        $card->birth_no         = $request->birth_no;
        $card->passport_no      = $request->passport_no;
        $card->nationality      = $request->nationality;
        $card->name             = $request->name;
        $card->dob              = date_create($request->dob);
        $card->gender           = $request->gender;
        $card->dose1date        = date_create($request->dose1date);
        $card->dose1name        = $request->dose1name;
        $card->dose2date        = date_create($request->dose2date);
        $card->dose2name        = $request->dose2name;
        $card->dose3date        = date_create($request->dose3date);
        $card->dose3name        = $request->dose3name;
        $card->vaccin_center    = $request->vaccin_center;
        $card->vaccin_by        = $request->vaccin_by;
        $card->total_dose       = $request->total_dose;
        $card->save();

        $msg = "Card Updated successfully!";
        return response()->json(['msg'=>$msg, 'cls'=>'success']);
    }



    public function deleteCard($id = null){
        $id = Crypt::decryptString($id);
        $card = Card::findOrFail($id);
        $card->delete();
        $notify[] = ['error','Card deleted successfully!'];
        return back()->withNotify($notify);
    }

    public function printDetails($id = null){
        $id = Crypt::decryptString($id);
        $card = Card::findOrFail($id);
        return view('print_details', compact('card'));
    }

    public function check_verify($txt = null){
        $id = base64_decode($txt);
        $card = Card::findOrFail($id);
        return view('check_verify', compact('card'));
    }

    public function allCards(){
        $cards = Card::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.all_cards', compact('cards'));
    }
}
