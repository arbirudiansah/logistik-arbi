<?php

namespace App\Http\Controllers;

use App\Models\OutgoingGoods;
use App\Models\StockItems;
use Illuminate\Http\Request;

class OutgoingGoodsController extends Controller
{
    public function create()
    {
        $itemCode = StockItems::all();

        return view('inputOutgoingGoods', compact('itemCode'));
    }

    public function sumOutgoingGoods() {
        $sumOutgoing = OutgoingGoods::sum('quantity');

        return view('index', compact('sumOutgoing'));
    }

    public function listOutgoingGoods() {
        $listOutgoing = OutgoingGoods::all();

        return view('outgoingGoodsList', compact('listOutgoing'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_outgoing_goods' => 'required|string|max:255',
            'item_code' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'destination' => 'required|string|max:255',
            'date_of_out' => 'required|date',
        ], [
            'quantity.integer' => 'Quantity hanya boleh berisi angka',
        ]);

        $stockItem = StockItems::where('item_code', $request->item_code)->first();

        if ($stockItem->quantity >= $request->quantity) {
            OutgoingGoods::create([
                'no_outgoing_goods' => $request->no_outgoing_goods,
                'item_code' => $request->item_code,
                'item_name' => $request->item_name,
                'quantity' => $request->quantity,
                'destination' => $request->destination,
                'date_of_out' => $request->date_of_out,
            ]);

            $stockItem->quantity -= $request->quantity;
            $stockItem->save();
        } else if($stockItem->quantity < $request->quantity) {
            return redirect()->back()->withErrors([
                'item_ovr_stock' => 'Jumlah barang yang diminta melebihi stock.'
            ])->withInput();
        }


        return redirect()->route('outgoing_goods.create')->with('success', 'Data Barang Keluar Berhasil disimpan.');
    }

    public function getItemName($itemCode)
    {
        $item = StockItems::where('item_code', $itemCode)->first();

        if ($item) {
            return response()->json(['item_name' => $item->item_name]);
        } else {
            return response()->json(['item_name' => '']);
        }
    }
}
