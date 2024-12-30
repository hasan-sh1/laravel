<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;
use App\Models\Puzzle;
use App\Models\UserPoint;
use App\Models\Purchase;
use App\Models\UserPuzzle;
use App\Models\UserPurchase;
use App\Models\Item;



class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //عدة عمليات شراء
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function userPoints()
    {
        return $this->hasMany(UserPoint::class);
    }

    //المشاركة في عدة الغاز
    public function userPuzzles()
    {
        return $this->belongsToMany(Puzzle::class, 'puzzles');
    }

    //عدة عمليات شراء من مستخدم والعكس
    public function userPurchases()
    {
        return $this->belongsToMany(Product::class, 'purchases');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products');
    }

    public function puzzles()
    {
        return $this->belongsToMany(Puzzle::class, 'puzzles');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }
}
