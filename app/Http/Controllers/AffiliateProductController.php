<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class AffiliateProductController extends Controller
{
    public function showAdCenter(Request $request)
    {
        $categoryId = $request->get('category', 'all');
        $query = Products::where('is_affiliate', 1);
    
        if ($categoryId != 'all') {
            $query->where('product_category', $categoryId);
        }
    
        $hotDeals = $query->get();
        $commissionThreshold = 8;
        $highComQuery = Products::where('commission_percentage', '>', $commissionThreshold)
            ->where('is_affiliate', 1);
    
        if ($categoryId != 'all') {
            $highComQuery->where('product_category', $categoryId);
        }
    
        $highCom = $highComQuery->get();
        $categories = Category::all(); 
    
        return view('affiliate_dashboard.ad_center', compact('hotDeals', 'highCom', 'categories'));
    }


    public function showPromoteModal($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('promote-modal', compact('product'));
    }



    public function downloadImages(Request $request)
    {
        $ids = explode(',', $request->query('ids'));
        $images = ProductImage::whereIn('id', $ids)->get();

        $zip = new \ZipArchive();
        $zipFileName = 'images.zip';
        $tempFile = tempnam(sys_get_temp_dir(), $zipFileName);
        $zip->open($tempFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($images as $image) {
            $filePath = storage_path('app/public/' . $image->image_path);
            if (file_exists($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            }
        }

        $zip->close();
        return response()->download($tempFile, $zipFileName)->deleteFileAfterSend(true);
        }


}
