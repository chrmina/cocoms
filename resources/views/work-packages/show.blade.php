<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $workPackage->name }}
            </h2>
            <div class="space-x-2">
                @can('update', $workPackage)
                    <a href="{{ route('work-packages.edit', $workPackage) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                        {{ __('Edit') }}
                    </a>
                @endcan
                @can('delete', $workPackage)
                    <form method="POST" action="{{ route('work-packages.destroy', $workPackage) }}" style="display: inline;">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Name</label>
                        <p class="text-gray-900 font-semibold">{{ $workPackage->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Number</label>
                        <p class="text-gray-900 font-semibold">{{ $workPackage->number ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Coordinator</label>
                        <p class="text-gray-900 font-semibold">{{ $workPackage->wp_coordinator ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">QS</label>
                        <p class="text-gray-900 font-semibold">{{ $workPackage->wp_qs ?? 'N/A' }}</p>
                    </div>
                </div>

                @if ($workPackage->letters->count())
                    <div class="mb-6 border-t pt-6">
                        <label class="block text-sm font-medium text-gray-600 mb-3">Letters ({{ $workPackage->letters_count }})</label>
                        <div class="space-y-2 max-h-64 overflow-y-auto">
                            @foreach ($workPackage->letters as $letter)
                                <a href="{{ route('letters.show', $letter) }}" class="block p-3 bg-gray-50 border border-gray-200 rounded hover:bg-blue-50 hover:border-blue-300">
                                    <p class="font-medium text-gray-900">{{ Str::limit($letter->subject, 70) }}</p>
                                    <p class="text-sm text-gray-600">{{ $letter->docdate?->format('Y-m-d') }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="flex justify-between border-t pt-6">
                    <a href="{{ route('work-packages.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                        {{ __('Back to Packages') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
