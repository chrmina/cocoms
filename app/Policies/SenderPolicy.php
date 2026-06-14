<?php

namespace App\Policies;

use App\Models\Sender;
use App\Models\User;

class SenderPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function view(User $user, Sender $sender): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function create(User $user): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function update(User $user, Sender $sender): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function delete(User $user, Sender $sender): bool
    {
        return $user->active && $user->role === 'admin';
    }
}
