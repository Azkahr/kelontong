<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Rating;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Order $order, OrderItem $orderItems){

        $orders = Order::where('users_id', auth()->user()->id)->get();

        $carts = Cart::where('users_id', Auth::id())->get();
        $user_rating = Rating::where('products_id', $orderItems->products_id)->where('users_id', Auth::id())->first();
        $review = Rating::where('products_id', $orderItems->products_id)->where('users_id', Auth::id())->first();

        return view('order.order', [
            "title" => "Order",
            "carts" => $carts,
            "orders" => $orders,
            "user_rating" => $user_rating,
            "review" => $review,
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
