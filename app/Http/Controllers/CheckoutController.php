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
        if (Session::get('customerId')) {
            $this->customer = Customer::find(Session::get('customerId'));
        } else {
            $this->customer = '';
        }
        return view('frontEnd.checkout.index', ['customer' => $this->customer]);
    }

    private function validateCustomer($request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:customers,mobile',
            'email' => 'required|unique:customers,email',
            'delivery_address' => 'required',
        ]);
    }

    public function cashOnDelivery(Request $request)
    {

        if (Session::get('customerId')) {
            $this->customer = Customer::find(Session::get('customerId'));
        } else {

            $this->validateCustomer($request);
            $this->customer = Customer::newCustomer($request);

            Session::put('customerId', $this->customer->id);
            Session::put('customerName', $this->customer->name);
        }

        $this->order = Order::newOrder($request, $this->customer->id);

        OrderDetail::newOrderDetail($this->order->id);

        return redirect('/order-complete')->with('message', 'Order placed successfully!!');
    }

    public function orderComplete()
    {
        return view('frontEnd.checkout.order-complete');
    }
}