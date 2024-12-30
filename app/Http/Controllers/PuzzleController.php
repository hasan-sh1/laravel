<?php

namespace App\Http\Controllers;

use App\Models\Puzzle;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PuzzleController extends Controller
{
    public function index()
    {
        $userPoints1 = Auth::user()->points;
        return view('profile.hasan.puzzles', compact('userPoints1'));
    }

    public function checkPuzzle(Request $request, Puzzle $puzzle)
    {
        if (strtolower($request->answer) === strtolower($puzzle->answer)) {
            $userPoints = UserPoint::firstOrCreate(
                ['user_id' => Auth::id()],
                ['points' => 0]
            );
            
            $userPoints->increment('points', $puzzle->points);

            return redirect()->back()->with('message', 'إجابة صحيحة! تم إضافة ' . $puzzle->points . ' نقاط لرصيدك.');
        }

        return redirect()->back()->with('error', 'إجابة خاطئة، حاول مرة أخرى.');
    }
} 