<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function newCard()
    {
        return view('new_card');
    }

    public function newCardStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'certificate_no'   => ['required','unique:'.Card::class],
            'type'             => 'required',
            // 'nid_no'           => 'required',
            // 'birth_no'         => 'required',
            // 'passport_no'      => 'required',
            'nationality'      => 'required',
            'name'             => 'required',
            'dob'              => 'required',
            'gender'           => 'required',
            // 'dose1date'        => 'required',
            // 'dose1name'        => 'required',
            // 'dose2date'        => 'required',
            // 'dose2name'        => 'required',
            // 'dose3date'        => 'required',
            // 'dose3name'        => 'required',
            'vaccin_center'    => 'required',
            'vaccin_by'        => 'required',
            'total_dose'       => 'required',
        ]);

        $card = new Card();
        $card->user_id          = auth()->user()->id;
        $card->certificate_no   = $request->certificate_no;
        $card->type             = $request->type;
        $card->nid_no           = $request->nid_no;
        $card->birth_no         = $request->birth_no;
        $card->passport_no      = $request->passport_no;
        $card->nationality      = $request->nationality;
        $card->name             = $request->name;
        $card->dob              = $request->dob;
        $card->gender           = $request->gender;
        $card->dose1date        = $request->dose1date;
        $card->dose1name        = $request->dose1name;
        $card->dose2date        = $request->dose2date;
        $card->dose2name        = $request->dose2name;
        $card->dose3date        = $request->dose3date;
        $card->dose3name        = $request->dose3name;
        $card->vaccin_center    = $request->vaccin_center;
        $card->vaccin_by        = $request->vaccin_by;
        $card->total_dose       = $request->total_dose;
        $card->save();

        $msg = "New card added successfully!";
        return response()->json(['msg'=>$msg, 'cls'=>'success']);
    }

    public function printDetails($id = null){
        $card = Card::findOrFail($id);
        return view('print_details', compact('card'));
    }

    public function check_verify($txt = null){
        $id = base64_decode(str_replace('/','',$txt));
        $card = Card::findOrFail($id);
        return view('check_verify', compact('card'));
    }

    public function allCards(){
        $cards = Card::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.all_cards', compact('cards'));
    }
}
