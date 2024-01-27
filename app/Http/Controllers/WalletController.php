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
        return view('wallet', [
            'modal' => Wallet::modal('wallet-modal'),
            'card' => Wallet::where('user_id', auth()->user()->id)->first(),
            'hash_number' => Wallet::getHashedCard(auth()->user()->id)
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
