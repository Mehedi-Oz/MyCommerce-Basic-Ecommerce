<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $category, $image, $imageNewName, $directory, $imgUrl;

    public static function storeCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;

        if ($request->hasFile('image')) {
            self::$category->image = self::saveImage($request);
        } else {
            self::$category->image = null;
        }

        self::$category->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'Category-' . rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'admin-asset/assets/upload-images/category/';
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl = self::$directory . self::$imageNewName;
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public static function statusCategory($id)
    {
        self::$category = Category::find($id);

        if (self::$category->status == 1) {
            self::$category->status = 2;
        } else {
            self::$category->status = 1;
        }
        self::$category->save();
    }


    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;

        if ($request->file('image')) {
            if (self::$category->image && file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = self::saveImage($request);
        }
        return self::$category->save();

    }

    public static function deleteCategory($request)
    {
        self::$category = Category::find($request->id);

        if (self::$category->image) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
        }
        self::$category->delete();
    }

}