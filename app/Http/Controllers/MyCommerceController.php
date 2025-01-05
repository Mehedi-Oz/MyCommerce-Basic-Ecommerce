<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index()
    {
        return view('frontEnd.home.index');
    }

    public function category()
    {
        return view('frontEnd.category.index');
    }
    public function detail()
    {
        return view('frontEnd.detail.index');
    }
}
