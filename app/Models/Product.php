<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private static $product, $image, $imageNewName, $directory, $imgUrl;

    public static function storeProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->subcategory_id = $request->subcategory_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->model = $request->model;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->status = $request->status;

        if ($request->hasFile('image')) {
            self::$product->image = self::saveImage($request);
        } else {
            self::$product->image = null;
        }

        self::$product->save();
        return self::$product;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'Product-' . rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'admin-asset/assets/upload-images/product/';
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl = self::$directory . self::$imageNewName;
    }

    public static function statusProduct($id)
    {
        self::$product = Product::find($id);

        if (self::$product->status == 1) {
            self::$product->status = 2;
        } else {
            self::$product->status = 1;
        }
        self::$product->save();
    }


    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);

        self::$product->category_id = $request->category_id;
        self::$product->subcategory_id = $request->subcategory_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->model = $request->model;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->status = $request->status;

        if ($request->file('image')) {
            if (self::$product->image && file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$product->image = self::saveImage($request);
        }
        return self::$product->save();

    }

    public static function deleteProduct($request)
    {
        self::$product = Product::find($request->id);

        if (self::$product->image) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
        }
        self::$product->delete();
    }
}
