<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Senders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <form method="GET" action="{{ route('senders.search') }}" class="flex gap-3">
                    <input type="text" name="q" value="{{ $query }}" placeholder="Search by name, email, contact..." 
                           class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                        {{ __('Search') }}
                    </button>
                    <a href="{{ route('senders.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                        {{ __('Clear') }}
                    </a>
                </form>
            </div>

            @if ($query)
                @if ($senders->count())
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3">Name</th>
                                        <th class="px-6 py-3">Representative</th>
                                        <th class="px-6 py-3">Email</th>
                                        <th class="px-6 py-3">Telephone</th>
                                        <th class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($senders as $sender)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                                            <td class="px-6 py-4 font-medium text-gray-900">{{ $sender->name }}</td>
                                            <td class="px-6 py-4">{{ $sender->representative }}</td>
                                            <td class="px-6 py-4">{{ $sender->email }}</td>
                                            <td class="px-6 py-4">{{ $sender->telephone }}</td>
                                            <td class="px-6 py-4 space-x-2 flex flex-wrap gap-1">
                                                <a href="{{ route('senders.show', $sender) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition-colors">View</a>
                                                @can('update', $sender)
                                                    <a href="{{ route('senders.edit', $sender) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors">Edit</a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-200">
                            {{ $senders->links() }}
                        </div>
                    </div>
                @else
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-gray-500 text-center">No senders found matching "{{ $query }}"</p>
                    </div>
                @endif
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-500 text-center">Enter a search term to find senders</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
