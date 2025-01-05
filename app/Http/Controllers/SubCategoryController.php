<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view("admin.subcategory.index", [
            "categories" => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        // return $request;
        SubCategory::storeSubCategory($request);
        return back()->with("message", "New SubCategory Added to the Database Successfully!");
    }

    public function manage()
    {
        return view("admin.subcategory.manage", [
            "subcategories" => SubCategory::all()
        ]);
    }

    public function edit($id)
    {
        return view("admin.subcategory.edit", [
            'subcategory' => SubCategory::find($id),
            "categories" => Category::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return back()->with("message", "SubCategory Information Updated Successfully!");
    }

    public function status($id)
    {
        SubCategory::statusSubCategory($id);
        return back()->with("message", "SubCategory Status Updated Successfully!");
    }

    public function delete(Request $request)
    {
        SubCategory::deleteSubCategory($request);
        return back()->with("message", "SubCategory Deleted!");
    }
}
