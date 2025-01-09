@extends('admin.master')

@section('title')
    Order Details
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Basic Information</h4>

                    <div class="table-responsive m-t-40">
                        <table class="table table-striped table-border table-hover">
                            <tr>
                                <th>Order Id</th>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$order->order_date}}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$order->order_total}} Tk</td>
                            </tr>
                            <tr>
                                <th>Tax Total</th>
                                <td>{{$order->tax_total}} Tk</td>
                            </tr>
                            <tr>
                                <th>Shipping Total</th>
                                <td>{{$order->shipping_total}} Tk</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td>{{$order->delivery_address}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Status</th>
                                <td>{{$order->delivery_status}}</td>
                            </tr>
                            <tr>
                                <th>Payment Type</th>
                                <td>{{$order->payment_type==1? 'Cash On Delivery': 'Online Payment'}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{$order->payment_status}}</td>
                            </tr>
                            <tr>
                                <th>Currency</th>
                                <td>{{$order->currency}}</td>
                            </tr>
                            <tr>
                                <th>Transaction Id</th>
                                <td>{{$order->transaction_id}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer Information</h4>

                    <div class="table-responsive m-t-40">
                        <table class="table table-striped table-border table-hover text-center">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>Email Address</th>
                                <th>Address</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{$order->customer->name}}</td>
                                <td>{{$order->customer->mobile}}</td>
                                <td>{{$order->customer->email}}</td>
                                <td>{{$order->customer->address}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Products Information</h4>

                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Order Amount</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($order->orderDetails as $orderDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$orderDetail->product_name}}</td>
                                    <td>{{$orderDetail->product_price}}</td>
                                    <td>{{$orderDetail->product_quantity}}</td>
                                    <td>{{$orderDetail->product_price * $orderDetail->product_quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
