<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TransactionController extends Controller
{
    //
    public function index()
    {
        return view('transaction', ['cards' => Wallet::all()]);
    }

    public function card(Request $request)
    {
        $card_request = Crypt::decryptString($request->all()['card']);

        $card = Wallet::where('cvc', $card_request)->first();

        return response(['card' => Crypt::decryptString($card->card_number), 'cvc' => $card->cvc]);
    }

    public function income(Request $request)
    {
        $cvc = $request->all()['cvc'];
        $card = Wallet::where('cvc', $cvc)->get('id')[0];


        $fields = $request->validate([
            'card',
            'income' => 'required'
        ]);
        $fields['card'] = $card->id;

        Income::updateOrcreate($fields);

        return response(['message' => 'Income Created Successfully', 'route' => '/expenses']);
    }

    public function expenses()
    {
        return view('expenses');
    }

    public function expense(Request $request)
    {
        $fields = $request->validate([
            'transaction_name' => 'required',
            'amount' => 'required'
        ]);

        Expense::create($fields);

        return redirect('/');
    }
}
