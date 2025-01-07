@extends('frontEnd.master')

@section('title')
    Checkout
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('home') }}">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <section class="checkout-steps-form-content collapse show"
                            style="padding-top: 25px; border-radius: 4px; border: 1px solid #e6e6e6;">

                            <ul class="nav nav-pills">
                                <li>
                                    <a href="" class="nav-link active" data-bs-target="#cash"
                                        data-bs-toggle="pill">Cash on delivery</a>
                                </li>
                                <li>
                                    <a href="" class="nav-link" data-bs-target="#online" data-bs-toggle="pill">Online
                                        Payment</a>
                                </li>
                            </ul>

                            <div class="">
                                <hr>
                            </div>

                            <form action="{{route('cash-on-delivery')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>User Name</label>
                                            <div class="row">
                                                <div class="col-md-12 form-input form">
                                                    <input type="text" placeholder="Name" name="name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email Address</label>
                                            <div class="form-input form">
                                                <input type="email" name=email placeholder="Email Address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Phone Number</label>
                                            <div class="form-input form">
                                                <input type="number" name="mobile" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Delivery Address</label>
                                            <div class="form-input form">
                                                <textarea name="delivery_address" style="padding-top: 10px; height: 70px"></textarea>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type</label>
                                            <div class="">
                                                <label> <input type="radio" name="payment_type" value="1" class="mx-2"
                                                        checked>Cash On Delivery</label>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-12">
                                        <div class="single-form button">
                                            <button class="btn" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">Confirm Order</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Shopping Cart</h5>

                            <div class="sub-total-price">
                                @php($subTotal = 0)
                                @foreach (Cart::content() as $cartProduct)
                                    <div class="total-price">
                                        <p class="value">
                                            {{ $cartProduct->name }}
                                            ({{ $cartProduct->qty }}x)
                                        </p>
                                        <p class="price">{{ $cartProduct->price * $cartProduct->qty }} Tk</p>
                                    </div>
                                    @php($subTotal += $cartProduct->price * $cartProduct->qty)
                                @endforeach
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subtotal:</p>
                                    <p class="price">{{ $subTotal }} Tk</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Amount (15%):</p>
                                    <p class="price">{{ $tax = round(($subTotal * 2) / 100) }} Tk</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Cost:</p>
                                    <p class="price">{{ $shipping = 120 }} Tk</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total:</p>
                                    <p class="price">{{ $order_total = $subTotal + $tax + $shipping }} Tk</p>
                                </div>
                                <?php
                                Session::put('order_total', $order_total);
                                Session::put('tax_total', $tax);
                                Session::put('shipping_total', $shipping);
                                ?>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
