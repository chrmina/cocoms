<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index(): View
    {
        $this->authorize('viewAny', User::class);

        $users = $this->userService->getAllUsers();

        return view('users.index', ['users' => $users]);
    }

    public function show(User $user): View
    {
        $this->authorize('view', $user);

        return view('users.show', ['user' => $user]);
    }

    public function create(): View
    {
        $this->authorize('create', User::class);

        $roles = ['viewer', 'editor', 'admin'];

        return view('users.create', ['roles' => $roles]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->createUser($request->validated());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user): View
    {
        $this->authorize('update', $user);

        $roles = ['viewer', 'editor', 'admin'];

        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->userService->updateUser($user, $request->validated());

        return redirect()->route('users.show', $user)->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete', $user);

        $this->userService->deleteUser($user);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function search(Request $request): View
    {
        $this->authorize('viewAny', User::class);

        $query = $request->input('q', '');
        $users = $query
            ? $this->userService->searchUsers($query)
            : $this->userService->getAllUsers();

        return view('users.search', ['users' => $users, 'query' => $query]);
    }
}
