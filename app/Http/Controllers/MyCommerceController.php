<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index()
    {
        return view('frontEnd.home.index', [
            'products' => Product::all()
        ]);
    }

    public function category($id)
    {
        return view('frontEnd.category.index', [
            'products' => Product::where('category_id', $id)->get(),
            'categories' => Category::all()
        ]);
    }

    public function subcategory($id)
    {
        // return SubCategory::all();
        return view('frontEnd.subcategory.index', [
            'products' => Product::where('subcategory_id', $id)->get(),
            'subcategories' => SubCategory::all()
        ]);
    }

    public function detail($id)
    {
        return view('frontEnd.detail.index', [
            'product' => Product::find($id)
        ]);
    }
}
