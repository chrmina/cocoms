<?php

namespace App\Policies;

use App\Models\Letter;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LetterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function view(User $user, Letter $letter): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function create(User $user): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function update(User $user, Letter $letter): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function delete(User $user, Letter $letter): bool
    {
        return $user->active && $user->role === 'admin';
    }

    public function restore(User $user, Letter $letter): bool
    {
        return $user->active && $user->role === 'admin';
    }

    public function forceDelete(User $user, Letter $letter): bool
    {
        return $user->active && $user->role === 'admin';
    }
}
