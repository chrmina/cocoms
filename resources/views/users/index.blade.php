<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('users.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                    {{ __('Add User') }}
                </a>
                <form method="GET" action="{{ route('users.search') }}" class="inline-flex">
                    <input type="text" name="q" placeholder="Search users..."
                        class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        value="">
                    <button type="submit"
                        class="ms-2 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                        {{ __('Search') }}
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($users->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-900">Username</th>
                                <th class="px-6 py-3 font-medium text-gray-900">Email</th>
                                <th class="px-6 py-3 font-medium text-gray-900">Name</th>
                                <th class="px-6 py-3 font-medium text-gray-900">Role</th>
                                <th class="px-6 py-3 font-medium text-gray-900">Status</th>
                                <th class="px-6 py-3 font-medium text-gray-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        <a href="{{ route('users.show', $user) }}"
                                            class="text-blue-600 hover:text-blue-900">
                                            {{ $user->username }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : ($user->role === 'editor' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($user->active)
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors">E</a>
                                        <form method="POST" action="{{ route('users.destroy', $user) }}"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded-full hover:bg-red-700 transition-colors"
                                                onclick="return confirm('Are you sure?')">D</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600">No users found.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
