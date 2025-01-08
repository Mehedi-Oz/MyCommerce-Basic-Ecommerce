@extends('frontEnd.master')

@section('title')
    Dashboard
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i>Home</a></li>
                        <li>Dashboard</li>
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
                            <a href="{{route('customer.orders')}}" class="list-group-item list-group-item-action">Profile</a>
                            <a href="{{route('customer.logout')}}" class="list-group-item list-group-item-action" aria-disabled="true">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <h2>My Dashboard</h2>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
