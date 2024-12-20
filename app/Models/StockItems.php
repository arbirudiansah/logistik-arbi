<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockItems extends Model
{
    protected $fillable = [
        'item_code',
        'item_name',
        'quantity',
        'last_update_stock'
    ];
}
