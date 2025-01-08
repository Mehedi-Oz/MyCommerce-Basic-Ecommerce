<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    private static $customer;
    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->mobile = $request->mobile;

        if ($request->password) {
            self::$customer->password = bcrypt($request->password);
        } else {
            self::$customer->password = bcrypt($request->mobile);
        }

        self::$customer->save();

        return self::$customer;
    }
}
