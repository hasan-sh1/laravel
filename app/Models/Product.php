<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'purchases');
    }

    public function userPoints()
    {
        return $this->hasMany(UserPoint::class);
    }

    public function puzzles()
    {
        return $this->hasMany(Puzzle::class);
    }

    public function userPuzzles()
    {
        return $this->belongsToMany(User::class, 'puzzles');
    }

    public function userPurchases()
    {
        return $this->belongsToMany(User::class, 'purchases');
    }

 
}
