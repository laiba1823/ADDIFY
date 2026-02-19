<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'from',
        'to',
        'amount',
        'status',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'from', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'to', 'id');
    }

}
