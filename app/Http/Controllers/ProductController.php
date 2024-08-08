<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request)
    {
        $title = $request->query('title');
        $image = $request->query('image');
        $price = $request->query('price');

        return view('single_product_page', compact('title', 'image', 'price'));
    }
}
