<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public function getAllUsers(): LengthAwarePaginator
    {
        return User::paginate(15);
    }

    public function getUserById(string $id): User
    {
        return User::findOrFail($id);
    }

    public function createUser(array $data): User
    {
        $data['id'] = Str::uuid();
        $data['password'] = Hash::make($data['password']);
        $data['active'] = $data['active'] ?? true;

        return User::create($data);
    }

    public function updateUser(User $user, array $data): User
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $user;
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }

    public function searchUsers(string $query): LengthAwarePaginator
    {
        return User::where('username', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orWhere('first_name', 'like', "%{$query}%")
            ->orWhere('last_name', 'like', "%{$query}%")
            ->paginate(15);
    }
}
