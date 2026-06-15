<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Letters') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <form method="GET" action="{{ route('letters.search') }}" class="flex gap-3">
                    <input type="text" name="q" value="{{ $query }}"
                        placeholder="Search by subject, from, to..."
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                        {{ __('Search') }}
                    </button>
                    <a href="{{ route('letters.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                        {{ __('Clear') }}
                    </a>
                </form>
            </div>

            @if ($query)
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
                                        <th class="px-6 py-3">Attachment</th>
                                        <th class="px-6 py-3">Reply?</th>
                                        <th class="px-6 py-3">Confidential</th>
                                        <th class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($letters as $letter)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="px-6 py-4 font-medium">
                                                <a href="{{ route('letters.show', $letter) }}"
                                                    class="text-blue-600 hover:text-blue-800 hover:underline">
                                                    {{ Str::limit($letter->subject, 50) }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-gray-600">{{ $letter->sender?->name }}</td>
                                            <td class="px-6 py-4 text-gray-600">{{ $letter->recipient?->name }}</td>
                                            <td class="px-6 py-4 text-gray-600">
                                                {{ $letter->docdate?->format('Y-m-d') }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-600">
                                                {{ $letter->docref }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-600">
                                                @if ($letter->filelink)
                                                    <a href="{{ asset('storage/' . $letter->filelink) }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">
                                                        Download
                                                    </a>
                                                @else
                                                    <span class="text-gray-400">—</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                @if ($letter->replyreq)
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                        ⚠️
                                                    </span>
                                                @else
                                                    <span class="text-gray-400">—</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                @if ($letter->confidential)
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        🔒
                                                    </span>
                                                @else
                                                    <span class="text-gray-400">—</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 flex gap-2">
                                                @can('update', $letter)
                                                    <a href="{{ route('letters.edit', $letter) }}"
                                                        class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors" title="Edit">E</a>
                                                @endcan
                                                @can('delete', $letter)
                                                    <form method="POST" action="{{ route('letters.destroy', $letter) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded-full hover:bg-red-700 transition-colors"
                                                            onclick="return confirm('Are you sure?')"
                                                            title="Delete">D</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-200">
                            {{ $letters->links() }}
                        </div>
                    </div>
                @else
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-gray-500 text-center">No letters found matching "{{ $query }}"</p>
                    </div>
                @endif
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-500 text-center">Enter a search term to find letters</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
