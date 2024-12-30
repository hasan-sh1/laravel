<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ItemExchange;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemExchangePolicy
{
    use HandlesAuthorization;

    public function update(User $user, ItemExchange $exchange)
    {
        return $user->id === $exchange->user_id;
    }

    public function delete(User $user, ItemExchange $exchange)
    {
        return $user->id === $exchange->user_id;
    }
} 