<?php

namespace App\Policies;

use App\Models\Favorite;
use App\Models\User;

class FavoritePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Favorite $favorite): bool
    {
        return $favorite->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function delete(User $user, Favorite $favorite): bool
    {
        return $favorite->user_id === $user->id;
    }
}
