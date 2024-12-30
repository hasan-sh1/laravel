<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemExchange extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'description',
        'exchange_type',
        'desired_item',
        'status'
    ];
}

