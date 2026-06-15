<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Letters') }}
            </h2>
            <div class="flex gap-3">
                @can('create', App\Models\Letter::class)
                    <a href="{{ route('letters.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700">
                        {{ __('Create Letter') }}
                    </a>
                @endcan
                <a href="{{ route('letters.export.excel') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-green-700">
                    {{ __('Export to Excel') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <form method="GET" action="{{ route('letters.search') }}" class="flex gap-2">
                    <input type="text" name="q" placeholder="Search letters..."
                           class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-purple-700">
                        {{ __('Search') }}
                    </button>
                </form>
            </div>

            <div class="mb-6 p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Filter by From (Sender) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">From (Sender)</label>
                        <form method="GET" action="{{ route('letters.index') }}" class="flex gap-2 items-center flex-nowrap">
                            @if ($filterTo)
                                <input type="hidden" name="to" value="{{ $filterTo }}">
                            @endif
                            <select name="from" class="flex-1 min-w-0 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                                <option value="">-- All Senders --</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ $filterFrom === $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($filterFrom)
                                <a href="{{ route('letters.index', $filterTo ? ['to' => $filterTo] : []) }}" class="inline-flex items-center px-3 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 text-xs font-medium flex-shrink-0">
                                    Clear
                                </a>
                            @endif
                        </form>
                    </div>

                    <!-- Filter by To (Recipient) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">To (Recipient)</label>
                        <form method="GET" action="{{ route('letters.index') }}" class="flex gap-2 items-center flex-nowrap">
                            @if ($filterFrom)
                                <input type="hidden" name="from" value="{{ $filterFrom }}">
                            @endif
                            <select name="to" class="flex-1 min-w-0 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" onchange="this.form.submit()">
                                <option value="">-- All Recipients --</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ $filterTo === $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($filterTo)
                                <a href="{{ route('letters.index', $filterFrom ? ['from' => $filterFrom] : []) }}" class="inline-flex items-center px-3 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 text-xs font-medium flex-shrink-0">
                                    Clear
                                </a>
                            @endif
                        </form>
                    </div>

                    <!-- Additional Filters -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex gap-2">
                            <a href="{{ route('letters.index', array_merge(request()->query(), ['filter' => ''])) }}" class="px-3 py-2 {{ !$filter ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-md text-xs font-medium hover:opacity-80">
                                All
                            </a>
                            <a href="{{ route('letters.index', array_merge(request()->query(), ['filter' => 'pending-response'])) }}" class="px-3 py-2 {{ $filter === 'pending-response' ? 'bg-orange-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-md text-xs font-medium hover:opacity-80">
                                Pending Reply
                            </a>
                            <a href="{{ route('letters.index', array_merge(request()->query(), ['filter' => 'confidential'])) }}" class="px-3 py-2 {{ $filter === 'confidential' ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-md text-xs font-medium hover:opacity-80">
                                Confidential
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if ($letters->count())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 cursor-pointer hover:bg-gray-200">
                                        <a href="{{ route('letters.index', array_merge(request()->query(), ['sort_by' => 'subject', 'sort_dir' => $sortBy === 'subject' && $sortDir === 'asc' ? 'desc' : 'asc', 'filter' => $filter])) }}" class="flex items-center gap-2">
                                            Subject
                                            @if($sortBy === 'subject')
                                                <span>{{ $sortDir === 'asc' ? '↑' : '↓' }}</span>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="px-6 py-3">From</th>
                                    <th class="px-6 py-3">To</th>
                                    <th class="px-6 py-3 cursor-pointer hover:bg-gray-200">
                                        <a href="{{ route('letters.index', array_merge(request()->query(), ['sort_by' => 'docdate', 'sort_dir' => $sortBy === 'docdate' && $sortDir === 'asc' ? 'desc' : 'asc', 'filter' => $filter])) }}" class="flex items-center gap-2">
                                            Date
                                            @if($sortBy === 'docdate')
                                                <span>{{ $sortDir === 'asc' ? '↑' : '↓' }}</span>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="px-6 py-3 cursor-pointer hover:bg-gray-200">
                                        <a href="{{ route('letters.index', array_merge(request()->query(), ['sort_by' => 'docref', 'sort_dir' => $sortBy === 'docref' && $sortDir === 'asc' ? 'desc' : 'asc', 'filter' => $filter])) }}" class="flex items-center gap-2">
                                            Doc. Ref.
                                            @if($sortBy === 'docref')
                                                <span>{{ $sortDir === 'asc' ? '↑' : '↓' }}</span>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="px-6 py-3">Attachment</th>
                                    <th class="px-6 py-3 cursor-pointer hover:bg-gray-200">
                                        <a href="{{ route('letters.index', array_merge(request()->query(), ['sort_by' => 'replyreq', 'sort_dir' => $sortBy === 'replyreq' && $sortDir === 'asc' ? 'desc' : 'asc', 'filter' => $filter])) }}" class="flex items-center gap-2">
                                            Reply?
                                            @if($sortBy === 'replyreq')
                                                <span>{{ $sortDir === 'asc' ? '↑' : '↓' }}</span>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="px-6 py-3 cursor-pointer hover:bg-gray-200">
                                        <a href="{{ route('letters.index', array_merge(request()->query(), ['sort_by' => 'confidential', 'sort_dir' => $sortBy === 'confidential' && $sortDir === 'asc' ? 'desc' : 'asc', 'filter' => $filter])) }}" class="flex items-center gap-2">
                                            Confidential
                                            @if($sortBy === 'confidential')
                                                <span>{{ $sortDir === 'asc' ? '↑' : '↓' }}</span>
                                            @endif
                                        </a>
                                    </th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($letters as $letter)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium">
                                            <a href="{{ route('letters.show', $letter) }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                                                {{ Str::limit($letter->subject, 50) }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $letter->sender?->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $letter->recipient?->name }}
                                        </td>
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
                                                <a href="{{ route('letters.edit', $letter) }}" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors" title="Edit">E</a>
                                            @endcan
                                            @can('delete', $letter)
                                                <form method="POST" action="{{ route('letters.destroy', $letter) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded-full hover:bg-red-700 transition-colors" onclick="return confirm('Are you sure?')" title="Delete">D</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4">
                        {{ $letters->links() }}
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-600 text-center">No letters found.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
