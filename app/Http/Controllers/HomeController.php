<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


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
        $categories = Category::with('subcategories.subSubcategories')->get();
        return view('home', ['categories' => $categories]);
    }
    

    
}
