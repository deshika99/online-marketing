<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerOrder;
use App\Models\Products;
use App\Models\Variation;
use App\Models\CustomerOrderItems;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CustomerOrderController extends Controller
{
    

   
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'company_name' => 'nullable|string|max:255',
            'apartment' => 'nullable|string|max:255',
        ]);


        // Retrieve cart items
        $cart = Auth::check() ? CartItem::where('user_id', Auth::id())->with('product')->get() : collect(session('cart', []));
        

        $cart = Auth::check() ? CartItem::where('user_id', Auth::id())->with('product')->get() : collect(session('cart', []));
        
        // Check if cart is empty
        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty. Add some items to proceed.');
        }


        $cartArray = $cart->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'price' => $item->product->normal_price,
                'quantity' => $item->quantity,
                'size' => $item->size,
                'color' => $item->color,
            ];
        })->toArray();

        $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartArray));

        $shipping = 250; // Example shipping cost

        $total = $subtotal + $shipping;

        $orderCode = 'ORD-' . substr((string) Str::uuid(), 0, 8);


        $orderData = [
            'order_code' => $orderCode,
            'customer_fname' => $request->input('first_name'),
            'customer_lname' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'company_name' => $request->input('company_name'),
            'address' => $request->input('address'),
            'apartment' => $request->input('apartment'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'date' => Carbon::now()->format('Y-m-d'),
            'total_cost' => $total,
            'discount' => 0,
            'vat' => 0,
            'user_id' => Auth::id(),

            'status' => 'Pending',

        ];

        $order = CustomerOrder::create($orderData);


        foreach ($cartArray as $item) {
            CustomerOrderItems::create([
                'order_code' => $orderCode,
                'product_id' => $item['product_id'],
                'date' => Carbon::now()->format('Y-m-d'),
                'cost' => $item['price'],
                'quantity' => $item['quantity'],
                'size' => $item['size'],
                'color' => $item['color'],
            ]);


            $product = Products::where('product_id', $item['product_id'])->first();
            if ($product) {
                $product->quantity -= $item['quantity'];
                $product->save();
            }


            // Update variations (size and color)
            $sizeVariation = Variation::where('product_id', $item['product_id'])->where('type', 'size')->where('value', $item['size'])->first();
            $colorVariation = Variation::where('product_id', $item['product_id'])->where('type', 'color')->where('value', $item['color'])->first();

            if ($sizeVariation) {
                $sizeVariation->quantity = max(0, $sizeVariation->quantity - $item['quantity']);

                $sizeVariation->save();
            }
            if ($colorVariation) {
                $colorVariation->quantity = max(0, $colorVariation->quantity - $item['quantity']);
                $colorVariation->save();
            }
        }


        return redirect()->route('payment', ['order_code' => $orderCode]);
 
    }

}