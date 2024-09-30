<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
            ->get();
    
        $categories = Category::with('subcategories.subSubcategories')->get();
    
        return view('home', [
            'categories' => $categories,
            'specialOffers' => $specialOffers
        ]);
    }
    

    
}
