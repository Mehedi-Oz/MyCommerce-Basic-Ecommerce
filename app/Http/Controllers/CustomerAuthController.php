<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    private $customer, $password;

    public function loginCustomer()
    {
        return view('frontEnd.customer.index');
    }

    public function loginCustomerCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer) {
            if (password_verify($request->password, $this->customer->password)) {

                Session::put('customerId', $this->customer->id);
                Session::put('customerName', $this->customer->name);

                return redirect('/');
            } else {
                return back()->with('message', 'Wrong Password!');
            }
        } else {
            return back()->with('message', 'Invalid Email Address!');
        }
    }

    public function registerCustomer()
    {
        return view('frontEnd.customer.register');
    }

    public function newCustomer(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:customers,mobile',
            'email' => 'required|unique:customers,email',
            'password' => 'required',
        ]);
        $this->customer = Customer::newCustomer($request);

        Session::put('customerId', $this->customer->id);
        Session::put('customerName', $this->customer->name);

        return redirect('/');
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