<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return view("admin.brand.index");
    }

    public function store(Request $request)
    {
        // return $request;
        Brand::storeBrand($request);
        return back()->with("message", "New Brand Added to the Database Successfully!");
    }

    public function manage()
    {
        return view("admin.brand.manage", [
            "brands" => Brand::all()
        ]);
    }

    public function edit($id)
    {
        return view("admin.brand.edit", [
            'brand' => Brand::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return back()->with("message", "Brand Information Updated Successfully!");
    }

    public function status($id)
    {
        Brand::statusBrand($id);
        return back()->with("message", "Brand Status Updated Successfully!");
    }

    public function delete(Request $request)
    {
        Brand::deleteBrand($request);
        return back()->with("message", "Brand Deleted Successfully!");
    }
}
