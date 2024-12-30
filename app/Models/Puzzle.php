<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Purchase;
use App\Models\UserPoint;



class Puzzle extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'answer', 'points'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function userPuzzles()
    {
        return $this->belongsToMany(User::class, 'puzzles');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userPurchases()
    {
        return $this->belongsToMany(User::class, 'purchases');
    }

    public function userPoints()
    {
        return $this->belongsToMany(User::class, 'user_points');
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'purchases');
    }


}

