<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Wallet extends Model
{
    use HasFactory;

    private static function getCardNumber(string $user)
    {
        $user_card = Wallet::where('user_id', $user)->first();

        $encrypted_card = $user_card->card_number;

        return Crypt::decryptString($encrypted_card);
    }

    public static function getHashedCard(string $user)
    {
        $card_number = Wallet::getCardNumber($user);
        $card_length = strlen($card_number) - 4;

        $hashCard = str_repeat('*', $card_length);

        return $hashCard . substr($card_number, -4);
    }

//    public static function getDateFormat()
//    {}

    public static function modal(?string $modal)
    {
        return view('modals.wallet-modal', ['card_type' => CardType::all()]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
