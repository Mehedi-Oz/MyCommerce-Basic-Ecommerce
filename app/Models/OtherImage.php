<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    private static $otherImage, $otherImages, $image, $imageNewName, $directory, $imgUrl;
    public static function storeOtherImage($images, $id)
    {
        foreach ($images as $image) {
            if ($image->isValid()) {
                self::$otherImage = new OtherImage();
                self::$otherImage->product_id = $id;
                self::$otherImage->image = self::saveImage($image);
                self::$otherImage->save();
            }
        }
    }

    private static function saveImage($image)
    {
        self::$imageNewName = 'Product-OtherImage-' . rand() . '.' . $image->getClientOriginalExtension();
        self::$directory = 'admin-asset/assets/upload-images/product/product-other-images/';
        $image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl = self::$directory . self::$imageNewName;
    }

    public static function updateOtherImage($images, $id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();

        foreach (self::$otherImages as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
        }

        self::storeOtherImage($images, $id);
    }

    public static function deleteOtherImage($image)
    {
        self::$otherImages = OtherImage::where('product_id', $image)->get();

        if (self::$otherImages->isEmpty()) {
            return;
        }

        foreach (self::$otherImages as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
        }


    }
}
