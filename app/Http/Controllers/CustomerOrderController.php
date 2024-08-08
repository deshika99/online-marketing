<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CustomerOrderController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validate request data
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postal_code' => 'required|string|max:10',
                
            ]);

            // Calculate total cost
            $cart = session('cart', []);
            $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
            $shipping = 250;
            $total = $subtotal + $shipping;

            
            $orderCode = 'ORD-' . Str::uuid()->toString();

            // Store order details
            $order = CustomerOrder::create([
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
                'date' => Carbon::now()->format('Y-m-d'), // Current date
                'total_cost' => $total,
                'discount' => 0, // Default discount if not used
                'vat' => 0, // Default VAT if not used
            ]);

            // Store order items
            foreach ($cart as $item) {
                CustomerOrderItems::create([
                    'order_code' => $orderCode,
                    'item' => $item['title'],
                    'date' => Carbon::now()->format('Y-m-d'), // Current date
                    'cost' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();
            session()->forget('cart');
            return redirect()->route('payment')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Order placement failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while placing the order. Please try again.');
        }
    }




}