<?php

namespace App\Http\Controllers;

use App\Models\IncomingGoods;
use App\Models\StockItems;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class IncomingGoodsController extends Controller
{
    public function create()
    {
        return view('inputIncomingGoods');
    }

    public function listIncomingGoods() {
        $listIncoming = IncomingGoods::all();

        return view('incomingGoodsList', compact('listIncoming'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_incoming_goods' => 'required|string|max:255',
            'item_code' => 'required|string|max:255',
            'item_name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'quantity' => 'required|integer',
            'origin' => 'required|string|max:255',
            'date_of_entry' => 'required|date',
        ], [
            'item_name.regex' => 'Nama barang hanya boleh berisi huruf dan spasi',
            'quantity.integer' => 'Quantity hanya boleh berisi angka',
        ]);

        $existingData = StockItems::where('item_code', $request->item_code)
        ->orWhere('item_name', $request->item_name)->first();

        if ($existingData) {
            if ($existingData->item_code != $request->item_code && $existingData->item_name == $request->item_name) {
                return redirect()->back()->withErrors([
                    'item_exist' => 'Nama barang sudah ada di database.'
                ])->withInput();
            }else if($existingData->item_code == $request->item_code && $existingData->item_name != $request->item_name){
                return redirect()->back()->withErrors([
                    'item_exist' => 'Kode barang sudah ada di database.'
                ])->withInput();
            }
        }

        IncomingGoods::create([
            'no_incoming_goods' => $request->no_incoming_goods,
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'origin' => $request->origin,
            'date_of_entry' => $request->date_of_entry,
        ]);

        $codeItems = StockItems::where('item_code', $request->item_code)->first();

        if($codeItems) {
            $codeItems->quantity += $request->quantity;
            $codeItems->save();
        }else {
            StockItems::create([
                'item_code' => $request->item_code,
                'item_name' => $request->item_name,
                'quantity' => $request->quantity,
                'last_update_stock' => $request->date_of_entry,
            ]);
        }

        return redirect()->route('incoming_goods.create')->with('success', 'Data Barang Masuk Berhasil disimpan.');
    }
}
