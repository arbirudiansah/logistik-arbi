<?php

namespace App\Http\Controllers;

use App\Models\IncomingGoods;
use App\Models\OutgoingGoods;
use App\Models\StockItems;
use Illuminate\Http\Request;

class StockItemsController extends Controller
{

    public function listStockItems() {
        $listStockItem = StockItems::all();

        return view('stockItemList', compact('listStockItem'));
    }
}
