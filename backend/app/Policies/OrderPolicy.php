<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['user', 'admin'], true);
    }

    public function view(User $user, Order $order): bool
    {
        return $user->role === 'admin' || $order->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->role === 'user';
    }

    public function updateStatus(User $user, Order $order): bool
    {
        return $user->role === 'admin';
    }

    public function cancel(User $user, Order $order): bool
    {
        return $user->role === 'user'
            && $order->user_id === $user->id
            && $order->status === 'pending';
    }
}
