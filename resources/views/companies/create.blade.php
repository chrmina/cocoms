<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('companies.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea id="address" name="address" rows="3" class="w-full px-3 py-2 border {{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('address') }}</textarea>
                        @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="representative" class="block text-sm font-medium text-gray-700 mb-2">Representative</label>
                        <input type="text" id="representative" name="representative" value="{{ old('representative') }}" class="w-full px-3 py-2 border {{ $errors->has('representative') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('representative') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="contact" class="block text-sm font-medium text-gray-700 mb-2">Contact</label>
                        <input type="text" id="contact" name="contact" value="{{ old('contact') }}" class="w-full px-3 py-2 border {{ $errors->has('contact') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('contact') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">Telephone</label>
                            <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" class="w-full px-3 py-2 border {{ $errors->has('telephone') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('telephone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="mobile" class="block text-sm font-medium text-gray-700 mb-2">Mobile</label>
                            <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}" class="w-full px-3 py-2 border {{ $errors->has('mobile') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('mobile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="fax" class="block text-sm font-medium text-gray-700 mb-2">Fax</label>
                        <input type="tel" id="fax" name="fax" value="{{ old('fax') }}" class="w-full px-3 py-2 border {{ $errors->has('fax') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('fax') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="remarks" class="block text-sm font-medium text-gray-700 mb-2">Remarks</label>
                        <textarea id="remarks" name="remarks" rows="3" class="w-full px-3 py-2 border {{ $errors->has('remarks') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('remarks') }}</textarea>
                        @error('remarks') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('companies.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                            {{ __('Create Company') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
