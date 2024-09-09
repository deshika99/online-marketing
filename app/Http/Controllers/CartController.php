<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{


    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $productId = $request->input('product_id');
            $item = CartItem::where('user_id', $user->id)
                            ->where('product_id', $productId)
                            ->first();

            if ($item) {
                $item->quantity = max($item->quantity, 1);
                $item->save();
            } else {
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'quantity' => 1,
                    'price' => $request->input('price'),
                    'title' => $request->input('title'), 
                    'image' => $request->input('image')  
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            $itemTitle = $request->input('title');
            $itemFound = false;

            foreach ($cart as &$item) {
                if ($item['title'] === $itemTitle) {
                    $item['quantity'] = max($item['quantity'], 1);
                    $itemFound = true;
                    break;
                }
            }

            if (!$itemFound) {
                $cart[] = [
                    'title' => $request->input('title'),
                    'price' => $request->input('price'),
                    'image' => $request->input('image'),
                    'quantity' => 1 
                ];
            }

            session()->put('cart', $cart);
        }

        $cartCount = Auth::check() ? CartItem::where('user_id', Auth::id())->sum('quantity') : count(session()->get('cart', []));
        return response()->json(['cart_count' => $cartCount]);
    }

    


    public function getCartCount()
    {
        if (Auth::check()) {
            $cartCount = CartItem::where('user_id', Auth::id())->count();
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
    
        return response()->json(['cart_count' => $cartCount]);
    }
    


    public function showCart()
    {
        $cart = Auth::check() ? CartItem::where('user_id', Auth::id())->get() : session()->get('cart', []);
        return view('shopping_cart', compact('cart'));
    }
    

    public function checkout()
    {
        if (Auth::check()) {
            $cart = CartItem::where('user_id', Auth::id())->get();
        } else {
            $cart = collect(session()->get('cart', []));
        }
    
        return view('checkout', compact('cart'));
    }
    

    

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        if (!$productId || !$quantity) {
            return response()->json(['success' => false, 'message' => 'Product ID or quantity missing'], 400);
        }
    
        if (Auth::check()) {
            $cartItem = CartItem::where('user_id', Auth::id())
                                ->where('product_id', $productId)
                                ->first();
    
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
                return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Cart item not found'], 404);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
                session()->put('cart', $cart);
                return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Cart item not found in session'], 404);
            }
        }
    }
    
    


    public function removeFromCart($productId)
    {
    
        if (Auth::check()) {
            $user = Auth::user();
            CartItem::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->delete();
        } else {
            $cart = session()->get('cart', []);
    
            foreach ($cart as $index => $item) {
                if ($item['product_id'] == $productId) {
                    unset($cart[$index]);
                    $cart = array_values($cart); 
                    session()->put('cart', $cart);
                    break;
                }
            }
        }
    
        $cartCount = Auth::check() ? CartItem::where('user_id', Auth::id())->sum('quantity') : count(session()->get('cart', []));
        return response()->json(['cart_count' => $cartCount]);
    }
    
    
    

}
