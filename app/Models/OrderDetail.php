<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderDetail extends Model
{
    private static $orderDetail;

    public static function newOrderDetail($orderId)
    {
        foreach (Cart::content() as $cartProduct) {
            self::$orderDetail = new OrderDetail();
            self::$orderDetail->order_id = $orderId;
            self::$orderDetail->product_id = $cartProduct->id;
            self::$orderDetail->product_name = $cartProduct->name;
            self::$orderDetail->product_price = $cartProduct->price;
            self::$orderDetail->product_quantity = $cartProduct->qty;
            self::$orderDetail->save();

            Cart::remove($cartProduct->rowId);
        }
    }
}
