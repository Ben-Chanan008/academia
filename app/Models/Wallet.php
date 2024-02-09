<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class Wallet extends Model
{
    use HasFactory;

    public static function getCardNumber(string $card_number)
    {
        $card_length = strlen($card_number);
        $hashed_length = $card_length - 4;

        $card = substr($card_number, -4);

        return str_repeat('*', $hashed_length) . $card;
    }


//    public static function getDateFormat()
//    {}

    public static function modal(?string $modal)
    {
        return view('modals.wallet-modal', ['card_type' => CardType::all()]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
