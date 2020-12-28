<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sell_id',
        'product_id',
        'amount',
        'unit_price',
        'total',
    ];
}
