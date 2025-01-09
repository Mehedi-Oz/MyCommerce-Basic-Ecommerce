<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .invoice-box {
            width: 90%;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">
                            <img
                                src="front-end-asset/images/logo/logo.svg"
                                style="width: 100%; max-width: 200px"
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
            <td colspan="4">
                <hr>
            </td>
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
            <td colspan="4">
                <hr>
            </td>
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

</body>
</html>
