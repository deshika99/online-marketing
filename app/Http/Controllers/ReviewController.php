<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $publishedReviews = Review::with(['product.images', 'user', 'media'])
            ->where('status', 'published')
            ->get();

        $pendingReviews = Review::with(['product.images', 'user'])
            ->where('status', 'pending')
            ->get();

        $pendingCount = $pendingReviews->count();
        return view('admin_dashboard.manage_reviews', compact('publishedReviews', 'pendingReviews', 'pendingCount'));
    }

    public function publish($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['status' => 'published']);
        return redirect()->route('manage.reviews')->with('success', 'Review published successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('manage.reviews')->with('success', 'Review deleted successfully.');
    }
}
