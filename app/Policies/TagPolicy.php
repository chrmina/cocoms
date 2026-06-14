<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;

class TagPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function view(User $user, Tag $tag): bool
    {
        return $user->active && in_array($user->role, ['user', 'editor', 'admin']);
    }

    public function create(User $user): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function update(User $user, Tag $tag): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function delete(User $user, Tag $tag): bool
    {
        return $user->active && $user->role === 'admin';
    }
}
