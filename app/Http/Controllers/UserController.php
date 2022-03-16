<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $orders = Order::where('users_id', Auth::id())->get();
        $carts = Cart::where('users_id', Auth::id())->get();

        return view('order', [
            "title" => "Order",
            "carts" => $carts,
            "orders" => $orders
        ]);
    }
}
