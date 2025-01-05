<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    private static $subcategory, $image, $imageNewName, $directory, $imgUrl;

    public static function storeSubCategory($request)
    {
        self::$subcategory = new SubCategory();
        self::$subcategory->name = $request->name;
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->description = $request->description;
        self::$subcategory->status = $request->status;

        if ($request->hasFile('image')) {
            self::$subcategory->image = self::saveImage($request);
        } else {
            self::$subcategory->image = null;
        }

        self::$subcategory->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'SubCategory-' . rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'admin-asset/assets/upload-images/sub-category/';
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl = self::$directory . self::$imageNewName;
    }

    public static function statusSubCategory($id)
    {
        self::$subcategory = SubCategory::find($id);

        if (self::$subcategory->status == 1) {
            self::$subcategory->status = 2;
        } else {
            self::$subcategory->status = 1;
        }
        self::$subcategory->save();
    }


    public static function updateSubCategory($request, $id)
    {
        self::$subcategory = SubCategory::find($id);

        self::$subcategory->name = $request->name;
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->description = $request->description;
        self::$subcategory->status = $request->status;

        if ($request->file('image')) {
            if (self::$subcategory->image && file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
            self::$subcategory->image = self::saveImage($request);
        }
        return self::$subcategory->save();

    }

    public static function deleteSubCategory($request)
    {
        self::$subcategory = SubCategory::find($request->id);

        if (self::$subcategory->image) {
            if (file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
        }
        self::$subcategory->delete();
    }
}
