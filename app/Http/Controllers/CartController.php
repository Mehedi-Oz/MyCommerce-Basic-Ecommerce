<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product;

    public function index()
    {

        // return Cart::content();
        return view('frontEnd.cart.index', [
            'cartProducts' => Cart::content()
        ]);
    }


    public function add(Request $request, $id)
    {
        $this->product = Product::find($id);

        Cart::add(
            $this->product->id,
            $this->product->name,
            $request->qty,
            $this->product->selling_price,
            [
                'image' => $this->product->image,
                'category' => $this->product->category->name,
                'brand' => $this->product->brand->name,
            ]
        );
        return redirect('/cart/show');
    }

    public function remove($id)
    {
        $rowId = $id;
        Cart::remove($rowId);
        return redirect('/cart/show');
    }

    public function update(Request $request, $id)
    {
        $rowId = $id;
        Cart::update($rowId, $request->qty);
        return redirect('/cart/show')->with('message', 'Item has been updated!');
    }

}
