<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Order $order){

        /* $orders = OrderItem::whereHas('order', function($p){
            $p->where('users_id', '=', auth()->user()->id);
        })->get(); */

        $orders = Order::where('users_id', auth()->user()->id)->get();

        $carts = Cart::where('users_id', Auth::id())->get();

        return view('order.order', [
            "title" => "Order",
            "carts" => $carts,
            "orders" => $orders,
        ]);
    }

    public function show($id){

        $orders = Order::where('id', $id)->where('users_id', Auth::id())->first();
        $carts = Cart::where('users_id', Auth::id())->get();

        return view('order.show', [
            "title" => "Order",
            "carts" => $carts,
            "orders" => $orders
        ]);
    }
}
