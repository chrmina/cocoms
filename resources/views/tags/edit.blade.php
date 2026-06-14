<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('tags.update', $tag) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="label" class="block text-sm font-medium text-gray-700 mb-2">Label</label>
                        <input type="text" id="label" name="label" value="{{ old('label', $tag->label) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('label') border-red-500 @enderror" required>
                        @error('label') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="namespace" class="block text-sm font-medium text-gray-700 mb-2">Namespace</label>
                        <input type="text" id="namespace" name="namespace" value="{{ old('namespace', $tag->namespace) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('namespace') border-red-500 @enderror">
                        @error('namespace') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-between gap-4 mt-8 pt-6 border-t border-gray-200" style="display: flex !important; visibility: visible !important;">
                        <a href="{{ route('tags.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Update Tag') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
