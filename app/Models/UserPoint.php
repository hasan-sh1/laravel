<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserPoint extends Model
{
    protected $fillable = ['user_id', 'points'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function puzzles()
    {
        return $this->belongsToMany(Puzzle::class, 'puzzles');
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'purchases');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products');
    }

    public function userPuzzles()
    {
        return $this->belongsToMany(User::class, 'puzzles');
    }

    public function userPurchases()
    {
        return $this->belongsToMany(User::class, 'purchases');
    }

    public function userProducts()
    {
        return $this->belongsToMany(User::class, 'products');
    }

    public function userPoints()
    {
        return $this->belongsToMany(User::class, 'user_points');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'items');
    }

    public function userItems()
    {
        return $this->belongsToMany(User::class, 'items');
    }



}

