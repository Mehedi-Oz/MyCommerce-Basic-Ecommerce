@extends('frontEnd.master')

@section('title')
    All Orders
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">All Orders</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i>Home</a></li>
                        <li>All Orders</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-3">
                    <div class="card card-body">
                        <div class="list-group">
                            <a href="{{route('customer.orders')}}"
                               class="list-group-item list-group-item-action">Order</a>
                            <a href="{{route('customer.logout')}}"
                               class="list-group-item list-group-item-action disabled" aria-disabled="true">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="text-center">
                            <tr>
                                <th>Sl No</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Order Total</th>
                                <th>Delivery Address</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @php $i=1; @endphp
                            @foreach($orders as $order)
                                <tbody class="text-center">
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_total}} Taka</td>
                                    <td>{{$order->delivery_address}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>
                                        <a href="" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
