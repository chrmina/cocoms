<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Letter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('letters.update', $letter) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="sender_id" class="block text-sm font-medium text-gray-700 mb-2">Sender</label>
                        <select id="sender_id" name="sender_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('sender_id') border-red-500 @enderror">
                            @foreach (\App\Models\Sender::orderBy('name')->get() as $sender)
                                <option value="{{ $sender->id }}" {{ $letter->sender_id == $sender->id ? 'selected' : '' }}>
                                    {{ $sender->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sender_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="recipient_id" class="block text-sm font-medium text-gray-700 mb-2">Recipient</label>
                        <select id="recipient_id" name="recipient_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('recipient_id') border-red-500 @enderror">
                            @foreach (\App\Models\Recipient::orderBy('name')->get() as $recipient)
                                <option value="{{ $recipient->id }}" {{ $letter->recipient_id == $recipient->id ? 'selected' : '' }}>
                                    {{ $recipient->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('recipient_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="work_package_id" class="block text-sm font-medium text-gray-700 mb-2">Work Package</label>
                        <select id="work_package_id" name="work_package_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('work_package_id') border-red-500 @enderror">
                            @foreach (\App\Models\WorkPackage::orderBy('name')->get() as $wp)
                                <option value="{{ $wp->id }}" {{ $letter->work_package_id == $wp->id ? 'selected' : '' }}>
                                    {{ $wp->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('work_package_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ $letter->subject }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('subject') border-red-500 @enderror" required>
                        @error('subject') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="docref" class="block text-sm font-medium text-gray-700 mb-2">Document Reference</label>
                        <input type="text" id="docref" name="docref" value="{{ $letter->docref }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('docref') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="docdate" class="block text-sm font-medium text-gray-700 mb-2">Document Date</label>
                        <input type="date" id="docdate" name="docdate" value="{{ $letter->docdate?->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('docdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    @if ($letter->filelink)
                        <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded">
                            <p class="text-sm text-blue-700">Current file: <strong>{{ basename($letter->filelink) }}</strong></p>
                            <p class="text-xs text-blue-600 mt-1">Upload a new file to replace it</p>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Upload Document</label>
                        <input type="file" id="file" name="file" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-xs text-gray-500">Optional: PDF or document file (Max 50MB)</p>
                        @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="contents" class="block text-sm font-medium text-gray-700 mb-2">Contents</label>
                        <textarea id="contents" name="contents" rows="8" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ $letter->contents }}</textarea>
                        @error('contents') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4 flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="confidential" value="1" {{ $letter->confidential ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-offset-0 focus:ring-blue-200">
                            <span class="ms-2 text-sm text-gray-600">Confidential</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="replyreq" value="1" {{ $letter->replyreq ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-offset-0 focus:ring-blue-200">
                            <span class="ms-2 text-sm text-gray-600">Reply Required</span>
                        </label>
                    </div>

                    <div class="flex justify-between gap-4 mt-8 pt-6 border-t border-gray-200" style="display: flex !important; visibility: visible !important;">
                        <a href="{{ route('letters.show', $letter) }}" class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Update Letter') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
