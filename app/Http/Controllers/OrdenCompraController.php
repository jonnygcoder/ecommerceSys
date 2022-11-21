<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    // GET
    public function allOrderBuyPen() {
        $dataOrderBuy = OrdenCompra::where('estado',0)->get();
        return view('admin.orderBuy.order_buy_all',compact('dataOrderBuy'));
    }

    public function allOrderBuyApro() {
        $dataOrderBuy = OrdenCompra::where('estado',1)->get();
        return view('admin.orderBuy.order_buy_all',compact('dataOrderBuy'));
    }

    public function allOrderBuyCan() {
        $dataOrderBuy = OrdenCompra::where('estado',2)->get();
        return view('admin.orderBuy.order_buy_all',compact('dataOrderBuy'));
    }
}
