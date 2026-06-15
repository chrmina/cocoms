<?php

namespace App\Policies;

use App\Models\WorkPackage;
use App\Models\User;

class WorkPackagePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->active && in_array($user->role, ['viewer', 'editor', 'admin']);
    }

    public function view(User $user, WorkPackage $workPackage): bool
    {
        return $user->active && in_array($user->role, ['viewer', 'editor', 'admin']);
    }

    public function create(User $user): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function update(User $user, WorkPackage $workPackage): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }

    public function delete(User $user, WorkPackage $workPackage): bool
    {
        return $user->active && in_array($user->role, ['editor', 'admin']);
    }
}
