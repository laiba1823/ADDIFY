<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type',
        'user_id',
        'current_balance',
        'card_holder',
        'card_expiry',
        'card_number',
        'account_number',
    ];
}
