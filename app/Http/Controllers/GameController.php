<?php

namespace App\Http\Controllers;

use App\Models\Puzzle;
use App\Models\Product;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class GameController extends Controller
{
    public function checkPuzzle(Request $request, Puzzle $puzzle)
    {
        if (strtolower($request->answer) === strtolower($puzzle->answer)) {
            $userPoints = UserPoint::firstOrCreate(
                ['user_id' => Auth::id()],
                ['points' => 0]
            );
            
            $userPoints->increment('points', $puzzle->points);
            
            return back()->with('message', 'إجابة صحيحة! حصلت على ' . $puzzle->points . ' نقاط');
        }
        
        return back()->with('message', 'إجابة خاطئة، حاول مرة أخرى');
    }

    public function buyProduct(Product $product)
    {
        $userPoints = UserPoint::where('user_id', Auth::id())->first();
        
        if (!$userPoints || $userPoints->points < $product->price) {
            return back()->with('message', 'نقاطك غير كافية لشراء هذا المنتج');
        }
        
        $userPoints->decrement('points', $product->price);
        return back()->with('message', 'تم شراء ' . $product->name . ' بنجاح!');
    }

    

//     public function showDashboard()
//     {
//         $userPoints1 = DB::table('user_points')
//             ->where('user_id', Auth::id())
//             ->value('points');
    
//         return view('profile.hasan.index', ['userPoints1' => $userPoints1 ?? 0]);
//     }

// public function getUserPoints()
// {
//     $points = DB::table('user_points')
//         ->where('user_id', Auth::id())
//         ->value('points');

//     return response()->json(['points' => $points ?? 0]);
// }
}

