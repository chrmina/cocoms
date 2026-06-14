<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Letters') }}
            </h2>
            <div class="flex gap-3">
                @can('create', App\Models\Letter::class)
                    <a href="{{ route('letters.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                        {{ __('Create Letter') }}
                    </a>
                @endcan
                <a href="{{ route('letters.export.excel') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                    {{ __('Export to Excel') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <form method="GET" action="{{ route('letters.search') }}" class="flex gap-2">
                    <input type="text" name="q" placeholder="Search letters..." 
                           class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-purple-700">
                        {{ __('Search') }}
                    </button>
                </form>
            </div>

            @if ($letters->count())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3">Subject</th>
                                    <th class="px-6 py-3">From</th>
                                    <th class="px-6 py-3">To</th>
                                    <th class="px-6 py-3">Date</th>
                                    <th class="px-6 py-3">Ref</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($letters as $letter)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ Str::limit($letter->subject, 50) }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $letter->sender?->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $letter->recipient?->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $letter->docdate?->format('Y-m-d') }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $letter->docref }}
                                        </td>
                                        <td class="px-6 py-4 space-x-2 flex flex-wrap gap-1">
                                            <a href="{{ route('letters.show', $letter) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition-colors">View</a>
                                            @can('update', $letter)
                                                <a href="{{ route('letters.edit', $letter) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors">Edit</a>
                                            @endcan
                                            @can('delete', $letter)
                                                <form method="POST" action="{{ route('letters.destroy', $letter) }}" style="display: inline;">
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
                        {{ $letters->links() }}
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600 text-center">No letters found.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
