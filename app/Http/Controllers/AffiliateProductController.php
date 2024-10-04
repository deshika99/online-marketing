<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\RaffleTicket;
use Illuminate\Http\Request;

class AffiliateProductController extends Controller
{


    public function showAdCenter(Request $request)
    {
        $categoryName = $request->get('category', 'all');
        $query = Products::where('is_affiliate', 1);
        $userTrackingIds = RaffleTicket::where('user_id', auth()->id())->get();

        if ($categoryName != 'all') {
            $query->where('product_category', $categoryName);
        }

        $hotDeals = $query->get();
        $commissionThreshold = 8;
        $highComQuery = Products::where('commission_percentage', '>', $commissionThreshold)
            ->where('is_affiliate', 1);

        if ($categoryName != 'all') {
            $highComQuery->where('product_category', $categoryName);
        }

        $highCom = $highComQuery->get();
        $categories = Category::all(); 

        return view('affiliate_dashboard.ad_center', compact('hotDeals', 'highCom', 'categories','userTrackingIds'));
    }


    


    public function showPromoteModal($product_id)
    {
        $product = Products::with('images')->where('product_id', $product_id)->firstOrFail();
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
