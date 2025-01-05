<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        return view("admin.unit.index");
    }

    public function store(Request $request)
    {
        // return $request;
        Unit::storeUnit($request);
        return back()->with("message", "New Unit Added to the Database Successfully!");
    }

    public function manage()
    {
        return view("admin.unit.manage", [
            "units" => Unit::all()
        ]);
    }

    public function edit($id)
    {
        return view("admin.unit.edit", [
            'unit' => Unit::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Unit::updateUnit($request, $id);
        return back()->with("message", "Unit Information Updated Successfully!");
    }

    public function status($id)
    {
        Unit::statusUnit($id);
        return back()->with("message", "Unit Status Updated Successfully!");
    }

    public function delete(Request $request)
    {
        Unit::deleteUnit($request);
        return back()->with("message", "Unit Deleted Successfully!");
    }
}
