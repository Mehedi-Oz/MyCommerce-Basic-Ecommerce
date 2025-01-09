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

                    <div class="m-t-40 mb-5">
                        <div class="invoice-box">
                            <table cellpadding="0" cellspacing="0">
                                <tr class="top">
                                    <td colspan="4">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                    <img
                                                        src="{{asset('front-end-asset')}}/images/logo/logo.svg"
                                                        style="width: 100%; max-width: 300px"
                                                    />
                                                </td>

                                                <td>
                                                    Invoice #: 00{{$order->id}}<br/>
                                                    Created: {{$order->order_date}}<br/>
                                                    Due: {{date('Y-m-d')}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="information">
                                    <td colspan="4">
                                        <table>
                                            <tr>
                                                <td>
                                                    <h4><u>Delivery Information</u></h4>
                                                    {{$order->customer->name}}<br/>
                                                    {{$order->customer->mobile}}<br/>
                                                    {{$order->delivery_address}}
                                                </td>

                                                <td>
                                                    <h4><u>Company Information</u></h4>
                                                    Acme Corp.<br/>
                                                    John Doe<br/>
                                                    john@example.com
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="heading">
                                    <td>Payment Method</td>

                                    <td colspan="3">Check #</td>
                                </tr>

                                <tr class="details">
                                    <td>{{$order->payment_type == 1 ? 'Cash': 'Online'}}</td>

                                    <td colspan="3">{{$order->order_total}} Tk</td>
                                </tr>

                                <tr class="heading">
                                    <td>Product Name</td>
                                    <td style="text-align: center;">Price</td>
                                    <td style="text-align: center;">Quantity</td>
                                    <td style="text-align: right;">Total</td>
                                </tr>
                                @php ($total_order=0)
                                @foreach($order->orderDetails as $orderDetail)
                                    <tr class="item">
                                        <td>{{$orderDetail->product_name}}</td>
                                        <td style="text-align: center;">{{$orderDetail->product_price}} Tk</td>
                                        <td style="text-align: center;">{{$orderDetail->product_quantity}}x</td>
                                        <td style="text-align: right;">{{$orderDetail->product_price * $orderDetail->product_quantity}}
                                            Tk
                                        </td>
                                    </tr>
                                    @php($total_order+=($orderDetail->product_price * $orderDetail->product_quantity))
                                @endforeach
                                <tr>
                                    <td colspan="2"><h5 class="text-left">..........................................</h5></td>
                                    <td colspan="2"><h5 class="text-right">..........................................</h5></td>
                                </tr>
                                <tr class="total">

                                    <td colspan="3">Order Sub Total</td>
                                    <td style="border-top:none; font-weight: 500">{{$total_order}} Tk</td>
                                </tr>
                                <tr class="total">
                                    <td colspan="3">Order Tax</td>
                                    <td style="border-top:none; font-weight: 500">{{$order->tax_total}} Tk</td>
                                </tr>
                                <tr class="total">
                                    <td colspan="3">Shipping Cost</td>
                                    <td style="border-top:none; font-weight: 500">{{$order->shipping_total}} Tk</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h5 class="text-left">..........................................</h5></td>
                                    <td colspan="2"><h5 class="text-right">..........................................</h5></td>
                                </tr>
                                <tr class="total">
                                    <td colspan="3" style="font-weight: bold">Total Payable</td>
                                    <td style="border-top:none;">{{$order->order_total}} Tk</td>
                                </tr>

                                <tr class="">
                                    <td style="width: 200px; text-align: center">
                                        <br>
                                        <h5>Prepared By</h5>
                                        <hr>
                                    </td>
                                    <td colspan="2"></td>
                                    <td style="text-align: center">
                                        <br>
                                        <h5>Received By</h5>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
