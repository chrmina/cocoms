<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Recipient Details') }}
            </h2>
            <div class="space-x-2">
                @can('update', $recipient)
                    <a href="{{ route('recipients.edit', $recipient) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                        {{ __('Edit') }}
                    </a>
                @endcan
                @can('delete', $recipient)
                    <form method="POST" action="{{ route('recipients.destroy', $recipient) }}" style="display: inline;">
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
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Name</label>
                        <p class="text-gray-900 font-semibold text-lg">{{ $recipient->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Contact</label>
                        <p class="text-gray-900">{{ $recipient->contact ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-600">Address</label>
                    <p class="text-gray-900 whitespace-pre-wrap">{{ $recipient->address ?? 'N/A' }}</p>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Representative</label>
                        <p class="text-gray-900">{{ $recipient->representative ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Email</label>
                        <p class="text-gray-900">
                            @if ($recipient->email)
                                <a href="mailto:{{ $recipient->email }}" class="text-blue-600 hover:text-blue-900">{{ $recipient->email }}</a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Telephone</label>
                        <p class="text-gray-900">{{ $recipient->telephone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Mobile</label>
                        <p class="text-gray-900">{{ $recipient->mobile ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Fax</label>
                        <p class="text-gray-900">{{ $recipient->fax ?? 'N/A' }}</p>
                    </div>
                </div>

                @if ($recipient->remarks)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-600">Remarks</label>
                        <div class="bg-gray-50 border border-gray-200 rounded p-4 text-gray-900 whitespace-pre-wrap">
                            {{ $recipient->remarks }}
                        </div>
                    </div>
                @endif
            </div>

            @if ($recipient->letters_count > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Letters to this Recipient') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3">Subject</th>
                                    <th class="px-6 py-3">From (Sender)</th>
                                    <th class="px-6 py-3">Date</th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipient->letters as $letter)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ Str::limit($letter->subject, 50) }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $letter->sender?->name }}</td>
                                        <td class="px-6 py-4 text-gray-600">{{ $letter->docdate?->format('Y-m-d') ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('letters.show', $letter) }}" class="text-blue-600 hover:text-blue-900 text-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div class="flex justify-between border-t mt-6 pt-6">
                <a href="{{ route('recipients.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                    {{ __('Back to Recipients') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
