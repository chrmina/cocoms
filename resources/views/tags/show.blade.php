<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tag Details') }}
            </h2>
            <div class="space-x-2">
                @can('update', $tag)
                    <a href="{{ route('tags.edit', $tag) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                        {{ __('Edit') }}
                    </a>
                @endcan
                @can('delete', $tag)
                    <form method="POST" action="{{ route('tags.destroy', $tag) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-red-700" onclick="return confirm('Are you sure?')">
                            {{ __('Delete') }}
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-600">Label</label>
                    <p class="text-gray-900 font-semibold text-lg">{{ $tag->label }}</p>
                </div>

                @if ($tag->namespace)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-600">Namespace</label>
                        <p class="text-gray-900">{{ $tag->namespace }}</p>
                    </div>
                @endif
            </div>

            @if ($tag->taggedItems_count > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Letters with this Tag') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3">Subject</th>
                                    <th class="px-6 py-3">From (Sender)</th>
                                    <th class="px-6 py-3">To (Recipient)</th>
                                    <th class="px-6 py-3">Date</th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tag->taggedItems as $tagged)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ Str::limit($tagged->letter?->subject, 50) }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $tagged->letter?->senderCompany?->name }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $tagged->letter?->recipientCompany?->name }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $tagged->letter?->docdate?->format('Y-m-d') ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('letters.show', $tagged->letter) }}" class="text-blue-600 hover:text-blue-900 text-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600 text-center">No letters tagged with this tag.</p>
                </div>
            @endif

            <div class="flex justify-between border-t mt-6 pt-6">
                <a href="{{ route('tags.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                    {{ __('Back to Tags') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
