<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItems;
use App\Models\Review;
use App\Models\ReviewMedia;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class UserDashboardController extends Controller
{
    
    public function myOrders()
    {
        $orders = CustomerOrder::with(['items.product'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc') 
            ->get();
    
        $pendingOrders = $orders->where('status', 'Pending');
        $confirmedOrders = $orders->where('status', 'Confirmed');
        $inProgressOrders = $orders->filter(function ($order) {
            return $order->status === 'In Progress' || $order->status === 'Paid';
        });
        $shippedOrders = $orders->where('status', 'Shipped');
        $deliveredOrders = $orders->where('status', 'Delivered');
        $cancelledOrders = $orders->where('status', 'Cancelled');
    
        return view('member_dashboard.myorders', compact(
            'orders',
            'pendingOrders',
            'confirmedOrders',
            'inProgressOrders',
            'shippedOrders',
            'deliveredOrders',
            'cancelledOrders'
        ));
    }
    


    

    public function updateProfile(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone_num' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female,other',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = auth()->user();

        
        // Handle file upload for profile image
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }
            $profilePicturePath = $request->file('profile_image')->store('profile_image', 'public');
            
            $user->profile_image = $profilePicturePath;
        }
    
        // Update the user's profile with the provided input
        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->phone_num = $request->input('phone_num');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender = $request->input('gender');
        
    
        // Save the updated user information
        $user->save();
    
        return redirect()->back()->with('status', 'Profile updated successfully!');
    }




    public function orderDetails($order_code)
    {
        $order = CustomerOrder::with(['items.product'])->where('order_code', $order_code)->first();
        if (!$order) {
            return redirect()->route('myorders')->with('error', 'Order not found');
        }
        return view('member_dashboard.order-details', compact('order'));
    }


    public function cancelOrder(Request $request, $order_code)
    {
        $order = CustomerOrder::where('order_code', $order_code)->first();
        if ($order) {
            $order->status = 'Cancelled';
            $order->save();

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }


    public function confirmDelivery(Request $request)
    {
        $order = CustomerOrder::where('order_code', $request->order_code)->first();
        if ($order) {
            $order->status = 'Delivered';
            $order->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }


    



    public function updatePassword(Request $request) 
    {
    // 1. Validation
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // 2. Check if current password is correct
    if (!Hash::check($request->input('current_password'), Auth::user()->password)) {
        throw ValidationException::withMessages([
            'current_password' => ['The provided password does not match your current password.'],
        ]);
    }

    // 3. Update the password
    $user = Auth::user();
    $user->password = Hash::make($request->input('new_password'));
    $user->save();

    // 4. Logout the user after password change to refresh session
    Auth::logout();

    // 5. Redirect user to login page with success message
    return redirect()->route('login')->with('success', 'Password changed successfully. Please login with your new password.');
    }



   


    public function myReviews()
    {
        $toBeReviewedItems = CustomerOrderItems::with(['order', 'product.images', 'product.variations']) 
        ->whereHas('order', function ($query) {
            $query->where('status', 'Delivered');
        })
        ->where('reviewed', 'no')
        ->whereHas('product') 
        ->get();

    
        $reviewedItems = Review::with(['product.images', 'product.variations']) 
            ->where('user_id', auth()->id())
            ->get();
    
        return view('member_dashboard.myreviews', compact('toBeReviewedItems', 'reviewedItems'));
    }
    


    public function writeReview(Request $request)
    {
        $product_id = $request->input('product_id');
        $color = $request->input('color');
        $size = $request->input('size');
        $quantity = $request->input('quantity');
        $cost = $request->input('cost');
        $order_code = $request->input('order_code'); 
    
        $product = Products::with('images')->where('product_id', $product_id)->firstOrFail();
    
        return view('member_dashboard.write-reviews', compact('product', 'color', 'size', 'quantity', 'cost', 'order_code'));
    }
    




    public function storeReview(Request $request)
    {
    
        try {
            $request->validate([
                'product_id' => 'required',
                'order_code' => 'required|string', 
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string',
                'is_anonymous' => 'required|boolean', 
                'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                'video' => 'nullable|mimes:mp4,mov,ogg|max:50000',
            ]);
    

            $review = Review::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'order_code' => $request->order_code, 
                'rating' => $request->rating,
                'comment' => $request->comment,
                'is_anonymous' => $request->is_anonymous,
            ]);
    
    
            CustomerOrderItems::where('order_code', $request->order_code)
                ->where('product_id', $request->product_id)
                ->update(['reviewed' => 'yes']);
    
    
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('reviews/images', 'public'); 
                    ReviewMedia::create([
                        'review_id' => $review->id,
                        'media_type' => 'image',
                        'media_path' => $imagePath,
                    ]);
                }
            }
    
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('reviews/videos', 'public'); 
    
                ReviewMedia::create([
                    'review_id' => $review->id,
                    'media_type' => 'video',
                    'media_path' => $videoPath,
                ]);
            }
    
            return redirect()->route('myreviews')->with('status', 'Review submitted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while submitting your review. Please try again.');
        }
    }
    
    //dashboard 

    public function index()
{
    if (Auth::check()) {
        $user = Auth::user();
        return view('member_dashboard.dashboard', compact('user'));
    } else {
        return redirect()->route('login');
    }
}

}