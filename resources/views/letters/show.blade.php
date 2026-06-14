<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Letter Details') }}
            </h2>
            <div class="space-x-2">
                @can('update', $letter)
                    <a href="{{ route('letters.edit', $letter) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                        {{ __('Edit') }}
                    </a>
                @endcan
                @can('delete', $letter)
                    <form method="POST" action="{{ route('letters.destroy', $letter) }}" style="display: inline;">
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
                        <label class="block text-sm font-medium text-gray-600">From (Sender)</label>
                        <p class="text-gray-900 font-semibold">{{ $letter->sender?->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">To (Recipient)</label>
                        <p class="text-gray-900 font-semibold">{{ $letter->recipient?->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Work Package</label>
                        <p class="text-gray-900 font-semibold">{{ $letter->workPackage?->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Document Reference</label>
                        <p class="text-gray-900 font-semibold">{{ $letter->docref ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Document Date</label>
                        <p class="text-gray-900 font-semibold">{{ $letter->docdate?->format('Y-m-d') ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Status</label>
                        <div class="flex space-x-2">
                            @if ($letter->confidential)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Confidential</span>
                            @endif
                            @if ($letter->replyreq)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Reply Required</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-600">Subject</label>
                    <p class="text-gray-900 font-semibold text-lg">{{ $letter->subject }}</p>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-600">Contents</label>
                    <div class="bg-gray-50 border border-gray-200 rounded p-4 text-gray-900 whitespace-pre-wrap">
                        {{ $letter->contents ?? 'No contents provided.' }}
                    </div>
                </div>

                @if ($letter->filelink)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-600">Attached Document</label>
                        <div class="bg-blue-50 border border-blue-200 rounded p-4">
                            <a href="{{ \Illuminate\Support\Facades\Storage::url($letter->filelink) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                                📥 Download Document
                            </a>
                            <p class="text-xs text-blue-600 mt-2">File: {{ basename($letter->filelink) }}</p>
                        </div>
                    </div>
                @endif

                @if ($letter->taggedItems->count())
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-600">Tags</label>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach ($letter->taggedItems as $tagged)
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $tagged->tag?->label }}
                                    @can('update', $letter)
                                        <form method="POST" action="{{ route('letters.tags.detach', [$letter, $tagged->tag]) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-2 text-blue-600 hover:text-red-600 font-bold">&times;</button>
                                        </form>
                                    @endcan
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @can('update', $letter)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Add Tag</label>
                        <form method="POST" action="{{ route('letters.tags.attach', $letter) }}" class="flex gap-2">
                            @csrf
                            <select name="tag_id" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a tag...</option>
                                @foreach (\App\Models\Tag::orderBy('label')->get() as $tag)
                                    @if (!$letter->taggedItems->contains('tag_id', $tag->id))
                                        <option value="{{ $tag->id }}">{{ $tag->label }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                                Add
                            </button>
                        </form>
                    </div>
                @endcan

                <div class="flex justify-between border-t pt-6">
                    <a href="{{ route('letters.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                        {{ __('Back to Letters') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
