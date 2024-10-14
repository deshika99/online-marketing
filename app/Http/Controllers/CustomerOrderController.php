<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerOrder;
use App\Models\Products;
use App\Models\Variation;
use App\Models\CustomerOrderItems;
use App\Models\RaffleTicket;
use App\Models\AffiliateReferral;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CustomerOrderController extends Controller
{


    public function trackReferral($tracking_id, $product_id)
    {
        // Find the raffle ticket by the tracking ID
        $raffleTicket = RaffleTicket::where('token', $tracking_id)->first();
    
        if ($raffleTicket) {
            // Find the specific referral record by raffle_ticket_id and product_id
            $referral = AffiliateReferral::where('raffle_ticket_id', $raffleTicket->id)
                                         ->where('product_url', 'like', '%' . $product_id . '%')
                                         ->first();
    
            if ($referral) {
                // Increment the referral count for the specific product referral
                $referral->increment('referral_count');
            }
        }
    }
    
    


   
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'company_name' => 'nullable|string|max:255',
            'apartment' => 'nullable|string|max:255',
        ]);

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
        $shipping = 300;
        $total = $subtotal + $shipping;

        $orderCode = 'ORD-' . substr((string) Str::uuid(), 0, 8);

        $orderData = [
            'order_code' => $orderCode,
            'customer_fname' => $request->input('first_name'),
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
            'user_id' => Auth::id(),
            'status' => 'Confirmed',
        ];

        $order = CustomerOrder::create($orderData);

        foreach ($cartArray as $item) {

            $tracking_id = session('tracking_id'); // Retrieve the tracking ID from session
            $this->trackReferral($tracking_id, $item['product_id']);

            CustomerOrderItems::create([
                'order_code' => $orderCode,
                'product_id' => $item['product_id'],
                'date' => Carbon::now()->format('Y-m-d'),
                'cost' => $item['price'],
                'quantity' => $item['quantity'],
                'size' => $item['size'],
                'color' => $item['color'],
            ]);

            // Reduce product quantity in Products and Variations table
            $product = Products::where('product_id', $item['product_id'])->first();
            if ($product) {
                $product->quantity -= $item['quantity'];
                $product->save();
            }

            // Handle size variation
            $sizeVariation = Variation::where('product_id', $item['product_id'])
                ->where('type', 'size')
                ->where('value', $item['size'])
                ->first();

            if ($sizeVariation && $sizeVariation->quantity >= $item['quantity']) {
                $sizeVariation->quantity -= $item['quantity'];
                $sizeVariation->save();
            }


            // Handle color variation
            $colorVariation = Variation::where('product_id', $item['product_id'])
                ->where('type', 'color')
                ->where('value', $item['color'])
                ->first();

            if ($colorVariation && $colorVariation->quantity >= $item['quantity']) {
                $colorVariation->quantity -= $item['quantity'];
                $colorVariation->save();
            }
        }

        



        return redirect()->route('payment', ['order_code' => $orderCode]);
 
    }

}


