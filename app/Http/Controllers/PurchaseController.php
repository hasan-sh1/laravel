<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $userPoints1 = Auth::user()->points;
        $purchases = Purchase::where('user_id', Auth::id())->with('product')->get();
        return view('profile.hasan.purchases', compact('purchases', 'userPoints1'));
    }

    public function destroy(Purchase $purchase)
    {
        if ($purchase->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'غير مسموح لك بحذف هذا المنتج.');
        }

        $userPoints = UserPoint::where('user_id', Auth::id())->first();
        $userPoints->increment('points', $purchase->product->price);
        
        $purchase->delete();

        return redirect()->back()->with('message', 'تم حذف المنتج واسترجاع النقاط بنجاح.');
    }
} 