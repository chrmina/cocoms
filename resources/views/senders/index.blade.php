<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Senders') }}
            </h2>
            <div class="flex gap-3">
                @can('create', App\Models\Sender::class)
                    <a href="{{ route('senders.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                        {{ __('Create Sender') }}
                    </a>
                @endcan
                <a href="{{ route('senders.export.excel') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                    {{ __('Export to Excel') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <form method="GET" action="{{ route('senders.search') }}" class="flex gap-2">
                    <input type="text" name="q" placeholder="Search senders..." 
                           class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-purple-700">
                        {{ __('Search') }}
                    </button>
                </form>
            </div>

            @if ($senders->count())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3">Name</th>
                                    <th class="px-6 py-3">Email</th>
                                    <th class="px-6 py-3">Contact</th>
                                    <th class="px-6 py-3">Letters</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($senders as $sender)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $sender->name }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $sender->email }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $sender->contact }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $sender->letters_count }}</td>
                                        <td class="px-6 py-4 space-x-2 flex flex-wrap gap-1">
                                            <a href="{{ route('senders.show', $sender) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition-colors">View</a>
                                            @can('update', $sender)
                                                <a href="{{ route('senders.edit', $sender) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors">Edit</a>
                                            @endcan
                                            @can('delete', $sender)
                                                <form method="POST" action="{{ route('senders.destroy', $sender) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded-full hover:bg-red-700 transition-colors" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4">
                        {{ $senders->links() }}
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600 text-center">No senders found.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
