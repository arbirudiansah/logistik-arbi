<?php

namespace App\Http\Controllers;

use App\Models\IncomingGoods;
use App\Models\OutgoingGoods;
use App\Models\StockItems;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function nameUser()
    {
        $user = auth()->user();
        return view('index', compact('user'));
    }
    public function sumGoods() {
        $sumIncoming = IncomingGoods::sum('quantity');
        $sumOutgoing = OutgoingGoods::sum('quantity');
        $sumStock = StockItems::sum('quantity');
        $itemList = StockItems::count();

        return view('index', compact('sumIncoming', 'sumOutgoing', 'sumStock', 'itemList'));
    }

}
