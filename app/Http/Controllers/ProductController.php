<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;

class ProductController extends Controller
{
    private $product;

    public function index()
    {
        return view("admin.product.index", [
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function getSubCategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|unique:products,code'
        ]);

        $this->product = Product::storeProduct($request);

        // return $this->product;
        if ($request->has('other_image') && !empty($request->other_image)) {
            OtherImage::storeOtherImage($request->other_image, $this->product->id);
        }

        return back()->with("message", "New Product Added to the Database Successfully!");
    }

    public function manage()
    {
        return view("admin.product.manage", [
            'products' => Product::all(),
        ]);
    }

    public function details($id)
    {
        return view("admin.product.details", [
            'product' => Product::find($id),
        ]);
    }

    public function edit($id)
    {
        return view("admin.product.edit", [
            'product' => Product::find($id),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
            'otherImages' => OtherImage::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);

        if ($request->other_image) {
            OtherImage::updateOtherImage($request->other_image, $id);
        }

        return back()->with("message", "Product Information Updated Successfully!");
    }

    public function status($id)
    {
        Product::statusProduct($id);
        return back()->with("message", "Product Status Updated Successfully!");
    }

    public function delete(Request $request)
    {
        Product::deleteProduct($request);
        OtherImage::deleteOtherImage($request->id);
        return back()->with("message", "Product Deleted!");
    }
}
