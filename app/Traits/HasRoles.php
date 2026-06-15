<?php

namespace App\Traits;

/**
 * @property bool $active
 * @property string $role
 */
trait HasRoles
{
    public function isAdmin(): bool
    {
        return $this->active && $this->role === 'admin';
    }

    public function isEditor(): bool
    {
        return $this->active && in_array($this->role, ['editor', 'admin']);
    }

    public function isUser(): bool
    {
        return $this->active;
    }

    public function hasRole(string ...$roles): bool
    {
        return $this->active && in_array($this->role, $roles);
    }

    public function canAccess(string $ability): bool
    {
        return \Illuminate\Support\Facades\Gate::check($ability);
    }

    public function cannotAccess(string $ability): bool
    {
        return \Illuminate\Support\Facades\Gate::denies($ability);
    }
}
