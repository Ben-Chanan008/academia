<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WalletController extends Controller
{
    //
    public function index()
    {
        $hashed_number = [];

        return view('wallet', [
            'modal' => Wallet::modal('wallet-modal'),
            'card' => Wallet::all(),
            'hash_number' => $hashed_number
        ]);
    }

    public function store(Request $request)
    {
        $field = $request->validate([
            'card_number' => 'required',
            'cvc' => 'required',
            'card_name' => 'required',
            'card_type' => 'required',
            'start' => 'required',
            'expiration' => 'required',
        ]);

        $user = auth()->user()->id;

        $field['card_number'] = Crypt::encryptString($field['card_number']);
        if($user)
            $field['user_id'] = $user;
        else
            abort(403, 'An Error Occurred');

        Wallet::create($field);

        return response(['message' => 'Card Added Successfully']);
    }
}
