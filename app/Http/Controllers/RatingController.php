<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request){
        
        $stars = $request->input('product_rating');
        $products_id = $request->input('products_id');
        $user_review = $request->input('user_review');

        $product = Product::where('id', $products_id)->first();
        $order = Order::where('users_id', Auth::id())->where('status', 'beres')
                    ->join('order_items', 'orders.id', 'order_items.orders_id')
                    ->where('order_items.products_id', $products_id)->first();

        if($product && $order){
            
            $verified = Order::where('orders.users_id', Auth::id())
                                ->join('order_items', 'orders.id', 'order_items.orders_id')
                                ->where('order_items.products_id', $products_id)->get();
                
                if($verified){
                    
                    $rating = Rating::where('users_id', Auth::id())->where('products_id', $products_id)->first();
                    
                    if($rating){
                        $rating->stars_rated = $stars;
                        $rating->user_review = $user_review;
                        $rating->update();
                        
                    } else {
                        Rating::create([
                            'users_id' => Auth::id(),
                            'products_id' => $products_id,
                            'stars_rated' => $stars,
                            'user_review' => $user_review
                        ]);
                    }
                    
                    smilify('success', 'Terima kasih sudah memberi rating untuk product ini');
                    
                    return redirect()->back();

                } else {
                    
                    smilify('gagal', 'Anda tidak bisa memberi rating untuk product ini karena belum melakukan order');
                    
                    return redirect()->back();
                }
        } else {
            
            smilify('gagal', 'Anda tidak bisa memberi rating tanpa membeli product ini');

            return redirect()->back();
        }
    }
}
