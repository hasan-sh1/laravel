<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ShopController extends Controller
{
    public function index()
    {
        $userPoints1 = Auth::user()->points;
        $products = Product::all();
        return view('profile.hasan.shop', compact('products', 'userPoints1'));
    }

    public function buyProduct(Product $product)
    {
        Log::info('Attempting to purchase product:', [
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'product_price' => $product->price
        ]);

        $userPoints = UserPoint::where('user_id', Auth::id())->first();

        if (!$userPoints || $userPoints->points < $product->price) {
            Log::warning('Insufficient points:', [
                'user_points' => $userPoints ? $userPoints->points : 0,
                'product_price' => $product->price
            ]);
            return redirect()->back()->with('error', 'نقاطك غير كافية لشراء هذا المنتج.');
        }

        try {
            $purchase = new Purchase();
            $purchase->user_id = Auth::id();
            $purchase->product_id = $product->id;
            $purchase->status = 'completed';
            $purchase->save();

            $userPoints->decrement('points', $product->price);

            Log::info('Purchase successful:', $purchase->toArray());

            return redirect()->back()->with('message', 'تم شراء المنتج بنجاح!');
        } catch (\Exception $e) {
            Log::error('Purchase failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'حدث خطأ أثناء عملية الشراء: ' . $e->getMessage());
        }
    }
} 