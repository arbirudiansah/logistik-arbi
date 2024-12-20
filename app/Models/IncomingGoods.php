<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingGoods extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_incoming_goods',
        'item_code',
        'item_name',
        'quantity',
        'origin',
        'date_of_entry',
    ];
}
