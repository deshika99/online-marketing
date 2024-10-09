<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItems;
use App\Models\Review;
use App\Models\ReviewMedia;
use App\Models\Products;
use App\Models\Address;
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
            ->paginate(12); 

        $pendingOrders = $orders->where('status', 'Confirmed');
        $inProgressOrders = $orders->filter(function ($order) {
            return $order->status === 'In Progress' || $order->status === 'Paid';
        });
        $shippedOrders = $orders->where('status', 'Shipped');
        $deliveredOrders = $orders->where('status', 'Delivered');
        $cancelledOrders = $orders->where('status', 'Cancelled');

        return view('member_dashboard.myorders', compact(
            'orders',
            'pendingOrders',
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

// In UserDashboardController.php

public function showAddresses()
{
    // Get the currently logged-in user
    $user = Auth::user();

    // Pass the user details to the addresses view
    return view('member_dashboard.addresses', compact('user'));
}


public function updateAddress(Request $request)
{
    // Get the currently logged-in user
    $user = Auth::user();

    // Validate the request data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|string|email|max:255',
        'address' => 'required|string|max:255',
        'apartment' => 'nullable|string|max:255',
        'city' => 'required|string|max:255',
        'postal_code' => 'required|string|max:10',
    ]);

    // Debugging: Check if data is received
    \Log::info('User Input:', $validatedData);
    
    // Update the user's details with the form input
    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->address = $request->input('address');
    $user->apartment = $request->input('apartment');
    $user->city = $request->input('city');
    $user->postal_code = $request->input('postal_code');

    // Save the updated details to the database
    if ($user->save()) {
        return redirect()->route('addresses')->with('success', 'Address updated successfully!');
    } else {
        return redirect()->route('addresses')->with('error', 'Failed to update address.');
    }
}


    

public function storeAddress(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|string|email|max:255',
        'address' => 'required|string|max:255',
        'apartment' => 'nullable|string|max:255',
        'city' => 'required|string|max:255',
        'postal_code' => 'required|string|max:10',
    ]);

    // Get the currently logged-in user
    $user = Auth::user();

    // Create a new address entry
    $address = new Address();
    $address->user_id = $user->id; // Set the user ID from the logged-in user
    $address->full_name = $validatedData['first_name']; // Adjusted to save the full name
    $address->phone_num = $validatedData['phone'];
    $address->email = $validatedData['email'];
    $address->address = $validatedData['address'];
    $address->apartment = $validatedData['apartment'];
    $address->city = $validatedData['city'];
    $address->postal_code = $validatedData['postal_code'];

    // Save the address to the database
    $address->save();

    // Redirect back to the addresses page with a success message
    return redirect()->route('addresses')->with('success', 'Save is Successful');
}

public function deleteAddress(Request $request)
{
    // Delete logic (if applicable)
    // Flash delete success message
    return redirect()->route('addresses')->with('success', 'Address deleted successfully');
}


}













