<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\SpecialOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class SpecialOffersController extends Controller
{
    public function createOffer()
    {
        $products = Products::select('product_id', 'product_name', 'normal_price')->get();
        return view('admin_dashboard.add_offers', compact('products'));
    }



    public function showOffers()
    {
        $offers = SpecialOffers::with(['product.images'])->get(); 
        return view('admin_dashboard.special_offers', compact('offers'));
    }
    

    
    public function storeOffer(Request $request)
    {
     
            $data = $request->validate([
                'month_year' => 'required',
                'products' => 'required|array',
                'products.*.product_id' => 'required|exists:products,product_id',
                'products.*.normal_price' => 'required|numeric',
                'products.*.offer_rate' => 'required|numeric|min:0|max:100',
                'products.*.offer_price' => 'required|numeric',
            ]);
    
            foreach ($data['products'] as $product) {
                SpecialOffers::create([
                    'product_id' => $product['product_id'],
                    'normal_price' => $product['normal_price'],
                    'offer_rate' => $product['offer_rate'],
                    'offer_price' => $product['offer_price'],
                    'month' => $data['month_year'],
                    'status' => 'active',
                ]);
            }
    
            return redirect()->route('special_offers')->with('status', 'Special offers added successfully!');
            return redirect()->back()->withErrors('There was an error while saving the offers. Please try again.');
        }

    
        public function edit($id)
        {
            $offer = SpecialOffers::with('product')->findOrFail($id);
            return view('admin_dashboard.edit_offers', compact('offer'));
        }
        

        public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'month' => 'required|date_format:Y-m',
            'offer_rate' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:Active,Inactive',
        ]);

        $offer = SpecialOffers::findOrFail($id);
        $offer->month = $validatedData['month'];
        $offer->offer_rate = $validatedData['offer_rate'];
        $offer->status = $validatedData['status'];

        $normalPrice = $offer->normal_price;
        $offerPrice = $normalPrice - ($normalPrice * ($offer->offer_rate / 100));
        $offer->offer_price = $offerPrice;

        $offer->save();

        return redirect()->route('special_offers')->with('status', 'Offer updated successfully.');
    }


    public function destroy($id)
    {
        $offer = SpecialOffers::findOrFail($id);
        $offer->delete();

        return redirect()->route('special_offers')->with('status', 'Product deleted successfully.');
    }






    public function showProductsWithSpecialOffers()
    {
        $perPage = 20;
        $products = Products::with(['specialOffer' => function ($query) {
            $query->where('status', 'active');
        }, 'images'])
        ->whereHas('specialOffer', function ($query) {
            $query->where('status', 'active');
        })
        ->paginate($perPage);


        return view('special_offers', compact('products'));
    }


}
