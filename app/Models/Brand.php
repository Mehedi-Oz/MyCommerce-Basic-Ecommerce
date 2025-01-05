<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    private static $brand, $image, $imageNewName, $directory, $imgUrl;

    public static function storeBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;

        if ($request->hasFile('image')) {
            self::$brand->image = self::saveImage($request);
        } else {
            self::$brand->image = null;
        }

        self::$brand->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'Brand-' . rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'admin-asset/assets/upload-images/brand/';
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl = self::$directory . self::$imageNewName;
    }

    public static function statusBrand($id)
    {
        self::$brand = Brand::find($id);

        if (self::$brand->status == 1) {
            self::$brand->status = 2;
        } else {
            self::$brand->status = 1;
        }
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;

        if ($request->file('image')) {
            if (self::$brand->image && file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = self::saveImage($request);
        }
        return self::$brand->save();

    }

    public static function deleteBrand($request)
    {
        self::$brand = Brand::find($request->id);

        if (self::$brand->image) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
        }
        self::$brand->delete();
    }
}
