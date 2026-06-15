<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <form method="GET" action="{{ route('tags.search') }}" class="flex gap-3">
                    <input type="text" name="q" value="{{ $query }}"
                        placeholder="Search by label, namespace..."
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                        {{ __('Search') }}
                    </button>
                    <a href="{{ route('tags.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                        {{ __('Clear') }}
                    </a>
                </form>
            </div>

            @if ($query)
                @if ($tags->count())
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3">Label</th>
                                        <th class="px-6 py-3">Namespace</th>
                                        <th class="px-6 py-3">Letters Count</th>
                                        <th class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                <a href="{{ route('tags.show', $tag) }}"
                                                    class="text-blue-600 hover:text-blue-900">
                                                    {{ $tag->label }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-gray-600">{{ $tag->namespace ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 text-gray-600">{{ $tag->taggedItems_count }}</td>
                                            <td class="px-6 py-4 flex gap-2">
                                                @can('update', $tag)
                                                    <a href="{{ route('tags.edit', $tag) }}"
                                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors">E</a>
                                                @endcan
                                                @can('delete', $tag)
                                                    <form method="POST" action="{{ route('tags.destroy', $tag) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded-full hover:bg-red-700 transition-colors"
                                                            onclick="return confirm('Are you sure?')">D</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="px-6 py-4">
                            {{ $tags->links() }}
                        </div>
                    </div>
                @else
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-gray-500 text-center">No tags found matching "{{ $query }}"</p>
                    </div>
                @endif
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-500 text-center">Enter a search term to find tags</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
