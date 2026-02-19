<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id', 'buyer_id', 'billboard_id', 'amount', 'description', 'time', 'status', 'number'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function billboard()
    {
        return $this->belongsTo(Billboard::class);
    }
}
