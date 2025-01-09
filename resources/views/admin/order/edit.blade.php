@extends('admin.master')

@section('title')
    View Invoice
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Invoice</h4>

                    <p class="text-success">{{session('message')}}</p>

                    <div class="m-t-40">
                        <form action="{{route('admin.update-order', ['id'=>$order->id])}}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-3">Customer Info</div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly
                                           value="{{$order->customer->name. ' ( Phone No: '.$order->customer->mobile.')'}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">Order Id</div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly value="{{$order->id}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">Order Total</div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly value="{{$order->order_total}} Tk">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">Order Status</div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly value="{{$order->order_status}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">Order Status</div>
                                <div class="col-md-9">
                                    <select name="order_status" id="" class="form-control">
                                        <option value="Pending" {{$order->order_status=='Pending' ? 'selected': ''}}>
                                            Pending
                                        </option>
                                        <option
                                            value="Processing" {{$order->order_status=='Processing' ? 'selected': ''}}>
                                            Processing
                                        </option>
                                        <option value="Complete" {{$order->order_status=='Complete' ? 'selected': ''}}>
                                            Complete
                                        </option>
                                        <option value="Cancel" {{$order->order_status=='Cancel' ? 'selected': ''}}>
                                            Cancel
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">Delivery Address</div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-success form-control" value="Update Order">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
