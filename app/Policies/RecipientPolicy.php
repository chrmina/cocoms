<?php

namespace App\Policies;

use App\Models\Recipient;
use App\Models\User;

class RecipientPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function view(User $user, Recipient $recipient): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function create(User $user): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function update(User $user, Recipient $recipient): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function delete(User $user, Recipient $recipient): bool
    {
        return $user->active && $user->role === 'admin';
    }
}
