<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;
use Cart;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;
    public function checkout()
    {
        return view("frontEnd.checkout.index");
    }

    public function cashOnDelivery(Request $request)
    {
        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->mobile = $request->mobile;
        $this->customer->password = bcrypt($request->mobile);
        $this->customer->save();

        Session::put('customerId', $this->customer->id);
        Session::put('customerName', $this->customer->name);

        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime(date('Y-m-d'));
        $this->order->order_total = Session::get('order_total');
        $this->order->tax_total = Session::get('tax_total');
        $this->order->shipping_total = Session::get('shipping_total');
        $this->order->delivery_address = $request->delivery_address;
        $this->order->payment_type = $request->payment_type;
        $this->order->save();

        foreach (Cart::content() as $cartProduct) {
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id = $cartProduct->id;
            $this->orderDetail->product_name = $cartProduct->name;
            $this->orderDetail->product_price = $cartProduct->price;
            $this->orderDetail->product_quantity = $cartProduct->qty;
            $this->orderDetail->save();

            Cart::remove($cartProduct->rowId);
        }

        return redirect('/order-complete')->with('message', 'Order placed successfully!!');
    }

    public function orderComplete()
    {
        return view('frontEnd.checkout.order-complete');
    }
}