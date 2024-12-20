<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingGoods extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_outgoing_goods',
        'item_code',
        'item_name',
        'quantity',
        'destination',
        'date_of_out',
    ];
}
