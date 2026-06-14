<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Work Package') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('work-packages.update', $workPackage) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" id="name" name="name" value="{{ $workPackage->name }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" required>
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="number" class="block text-sm font-medium text-gray-700 mb-2">Number</label>
                        <input type="text" id="number" name="number" value="{{ $workPackage->number }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="wp_coordinator" class="block text-sm font-medium text-gray-700 mb-2">Coordinator</label>
                        <input type="text" id="wp_coordinator" name="wp_coordinator" value="{{ $workPackage->wp_coordinator }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('wp_coordinator') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="wp_qs" class="block text-sm font-medium text-gray-700 mb-2">QS</label>
                        <input type="text" id="wp_qs" name="wp_qs" value="{{ $workPackage->wp_qs }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('wp_qs') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-between gap-4 mt-8 pt-6 border-t border-gray-200" style="display: flex !important; visibility: visible !important;">
                        <a href="{{ route('work-packages.show', $workPackage) }}" class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Update Package') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
