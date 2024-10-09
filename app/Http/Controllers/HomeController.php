<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sale;
use App\Models\SpecialOffers;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

  
    public function index()
    {
        $specialOffers = SpecialOffers::with(['product.images'])
            ->where('status', 'active')
            ->take(5) // Limit the results to 5
            ->get();

        $flashSales = Sale::with(['product.images'])
            ->where('status', 'active')
            ->where('end_date', '>=', now()) 
            ->take(6)
            ->get();

        $categories = Category::with('subcategories.subSubcategories')->get();

        return view('home', [
            'categories' => $categories,
            'specialOffers' => $specialOffers,
            'flashSales' => $flashSales
        ]);
    }

    

    
}
