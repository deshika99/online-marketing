<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubcategory;

class CategoryController extends Controller
{


        public function showCategories()
    {
        $categories = Category::with('subcategories.subSubcategories')->get();
        
        return view('admin_dashboard.category', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'parent_category' => 'nullable|string|max:255',
            'subcategories.*.name' => 'nullable|string|max:255',
            'sub_subcategories.*.name' => 'nullable|string|max:255',
        ]);
    

        $parentCategory = Category::create([
            'parent_category' => $request->input('parent_category'),
        ]);
    

        $subcategories = $request->input('subcategories', []);
        $subSubcategories = $request->input('sub_subcategories', []);
        
        foreach ($subcategories as $index => $subcategory) {
            $subCat = Subcategory::create([
                'category_id' => $parentCategory->id,
                'subcategory' => $subcategory['name'],
            ]);
    
            if (!empty($subSubcategories[$index])) {
                SubSubcategory::create([
                    'subcategory_id' => $subCat->id,
                    'sub_subcategory' => $subSubcategories[$index]['name'],
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Category added successfully.');
    }
    
    
}
