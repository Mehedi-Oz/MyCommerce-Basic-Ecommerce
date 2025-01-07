<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    private $customer;

    public function loginCustomer()
    {
        return view('frontEnd.customer.index');
    }

    public function loginCustomerCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email);
    }

    public function registerCustomer()
    {
        return view('frontEnd.customer.register');
    }

    public function newCustomer(Request $request)
    {
        return $request->all();
    }

    public function dashboardCustomer()
    {
        return view('frontEnd.customer.dashboard');
    }

    public function logoutCustomer(Request $request)
    {
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }
}