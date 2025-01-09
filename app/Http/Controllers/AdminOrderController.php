<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use PDF;

class AdminOrderController extends Controller
{
    private $order;

    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($id)
    {
        return view('admin.order.detail', [
            'order' => Order::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.order.edit', [
            'order' => Order::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
//        return $request;

        $this->order = Order::find($id);
        if ($request->order_status == 'Pending') {
//            return $request;
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();

        } elseif ($request->order_status == 'Processing') {
//            return $request;
            $this->order->order_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();

        } elseif ($request->order_status == 'Complete') {
//            return $request;
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();

        } elseif ($request->order_status == 'Cancel') {
//            return $request;
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();

        }
        return back()->with('message', 'Order Status Updated to Processing');
    }

    public function showInvoice($id)
    {
        return view('admin.order.invoice', [
            'order' => Order::find($id)
        ]);
    }

    public function printInvoice($id)
    {
        $pdf = PDF::loadView('admin.order.printInvoice', [
            'order' => Order::find($id)
        ]);
        return $pdf->stream($id.'-order.pdf');
    }

    public function delete(Request $request)
    {
        return $request;
    }
}
