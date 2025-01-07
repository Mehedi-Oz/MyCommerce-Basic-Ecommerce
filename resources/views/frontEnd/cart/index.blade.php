@extends('frontEnd.master')


@section('title')
    Cart
@endsection


@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                        <div class="text-success">
                            {{session('message')}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                @php($subTotal = 0)

                @foreach ($cartProducts as $cartProduct)
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href=""><img src="{{ asset($cartProduct->options->image) }}" alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="">
                                        {{ $cartProduct->name }}</a></h5>
                                <p class="product-des">
                                    <span><em>Category: </em>{{ $cartProduct->options->category }}</span>
                                    <span><em>Brand: </em>{{ $cartProduct->options->brand }}</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="count-input">
                                    {{ $cartProduct->price }} Taka
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <form action="{{ route('cart.update', ['id' => $cartProduct->rowId]) }}" method="post">
                                    @csrf
                                    <div class="input-group" style="margin-left: -52px;">
                                        <input class="form-control" value="{{ $cartProduct->qty }}" name="qty"
                                            min="1" required>
                                        <input type="submit" class="btn btn-success btn-sm" value="Update">
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ $cartProduct->price * $cartProduct->qty }} Taka</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item" onclick="return confirm('Remove this item?')"
                                    href="{{ route('cart.remove', ['id' => $cartProduct->rowId]) }}">
                                    <i class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>
                    @php($subTotal += $cartProduct->price * $cartProduct->qty)
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{ $subTotal }} Taka</span></li>
                                        <li>Tax<span>{{ $tax = round(($subTotal * 2) / 100) }} Tk</span></li>
                                        <li>Shipping Cost<span>{{ $shipping = 120 }} Tk</span></li>
                                        <li class="last">Tatal Payable<span>{{ $subTotal + $tax + $shipping }}
                                                Taka</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                        <a href="{{ route('home') }}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
