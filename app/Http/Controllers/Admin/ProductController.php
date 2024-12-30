<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                if (!$image->move(public_path('images/products'), $imageName)) {
                    throw new \Exception('فشل في حفظ الصورة');
                }
                
                $product->image = 'images/products/' . $imageName;
            }

        $product->save();

        return redirect()->route('admin.products.create')
            ->with('message', 'تم إضافة المنتج بنجاح');
    }
}