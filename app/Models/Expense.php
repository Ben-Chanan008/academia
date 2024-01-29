<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public static function get_cvc($cvc)
    {
        $card = Wallet::where('cvc', $cvc)->first();

        $income = Income::where('card', $card->id)->first();

        return $income;
    }
}
