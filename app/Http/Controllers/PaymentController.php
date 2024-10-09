<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerOrder;
use App\Models\Products;
use App\Models\Variation;
use App\Models\CustomerOrderItems;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PaymentController extends Controller
{

    public function payment($order_code)
    {

        if (Auth::check()) {
            $cart = CartItem::with('product')->where('user_id', Auth::id())->get();
        } else {
            $cartItems = session()->get('cart', []);
            $cart = collect($cartItems)->map(function ($item) {
                $product = Products::where('product_id', $item['product_id'])->first();
                $item['product'] = $product;
                return (object) $item;
            });
        }
        return view('payment', compact('cart', 'order_code'));
    }



    public function confirmCod(Request $request, $order_code)
    {
        $order = CustomerOrder::where('order_code', $order_code)->first();
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

            if (Auth::check()) {
                $order->update([
                    'payment_method' => 'COD',
                    'payment_status' => 'Not Paid', 
                ]);

                CartItem::where('user_id', Auth::id())->delete();
            } else {
                $order->update([
                    'payment_method' => 'COD',
                    'payment_status' => 'Not Paid',
                ]);

                session()->forget('cart');
            }

            return redirect()->route('order.thankyou', ['order_code' => $order_code])
                ->with('success', 'Order confirmed successfully with Cash on Delivery.');
    }


    
    public function getOrderDetails($order_code)
    {

        $order = CustomerOrder::where('order_code', $order_code)->first();
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('order_received', [
            'order_code' => $order_code,
            'total_cost' => $order->total_cost, 
        ]);
    }

    
    

}
