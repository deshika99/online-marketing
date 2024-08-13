<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $itemTitle = $request->input('title');
        $itemFound = false;

        // Check if the item already exists in the cart
        foreach ($cart as &$item) {
            if ($item['title'] === $itemTitle) {
                $item['quantity'] = $item['quantity'] + 1;
                $itemFound = true;
                break;
            }
        }

        // If the item does not exist in the cart, add it
        if (!$itemFound) {
            $cart[] = [
                'title' => $itemTitle,
                'price' => $request->input('price'),
                'image' => $request->input('image'),
                'quantity' => 1 
            ];
        }

        session()->put('cart', $cart);
        $cartCount = count($cart);
        return response()->json(['cart_count' => $cartCount]);
    }




    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
        return response()->json(['cart_count' => $cartCount]);
    }


    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('shopping_cart', compact('cart'));
    }



    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }


    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $index = $request->input('index');
        $quantity = (int) $request->input('quantity');

        if (isset($cart[$index])) {
            // Ensure quantity is at least 1
            $cart[$index]['quantity'] = max($quantity, 1);
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }



    public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); 
            session()->put('cart', $cart);
        }

        return response()->json(['cart_count' => count($cart)]);
    }

}
