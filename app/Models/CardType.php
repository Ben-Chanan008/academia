<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    use HasFactory;

    public static function getCardType ($card)
    {
        return CardType::where('id', $card)->get('card_type')[0]->card_type;
    }
}
