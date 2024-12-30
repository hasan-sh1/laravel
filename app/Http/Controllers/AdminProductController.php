<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function create()
    {
        
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string'
        ]);
        Product::create($validated);
        return redirect()->back()->with('message', 'تم إضافة المنتج بنجاح');
    }
    

} 