<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Session;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    private $order;
    public function showOrders()
    {
        $this->order = Order::where('customer_id', Session::get('customerId'))->get();

        // return $this->order;
        return view('frontEnd.customer.allorders', [
            'orders' => $this->order
        ]);
    }
}
