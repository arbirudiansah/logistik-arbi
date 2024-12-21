<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncomingGoodsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OutgoingGoodsController;
use App\Http\Controllers\StockItemsController;
use App\Http\Middleware\LogistikMiddleware;
use App\Models\StockItems;
use Illuminate\Support\Facades\Route;

Route::middleware([LogistikMiddleware::class])->group(function(){
    Route::get('/index',[IndexController::class, 'sumGoods'])
->name('index_incoming_outgoing.detail');

Route::get('/tables', function () {
    return view('tables');
})->name('tables');

Route::get('/incomingGoodsList', function () {
    return view('incomingGoodsList');
})->name('incomingGoodsList');

Route::get('/outgoingGoodsList', function () {
    return view('outgoingGoodsList');
})->name('outgoingGoodsList');

Route::get('/incoming-goods/create',
[IncomingGoodsController::class, 'create'])
->name('incoming_goods.create');

Route::post('/incoming-goods', [IncomingGoodsController::class, 'store'])
->name('incoming_goods.store');

Route::get('/incoming-goods/list', [IncomingGoodsController::class, 'listIncomingGoods'])
->name('incoming_goods.list');

Route::get('/outgoing-goods/create',
[OutgoingGoodsController::class, 'create'])
->name('outgoing_goods.create');

Route::post('/outgoing-goods', [OutgoingGoodsController::class, 'store'])
->name('outgoing_goods.store');

Route::get('/get-item-name/{itemCode}', [OutgoingGoodsController::class, 'getItemName']);

Route::get('/outgoing-goods/list', [OutgoingGoodsController::class, 'listOutgoingGoods'])
->name('outgoing_goods.list');

Route::get('/stock-items/list', [StockItemsController::class, 'listStockItems'])
->name('stock_items.list');
});

Route::get('/login', [AuthController::class, 'loginForm'])
->name('login');

Route::post('/login',[AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])
->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


