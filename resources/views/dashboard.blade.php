<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="mb-6 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-6">
                <h1 class="text-white text-3xl font-bold mb-2">Welcome, {{ $user->first_name }}!</h1>
                <p class="text-blue-100">You are logged in as <strong>{{ ucfirst($user->role) }}</strong></p>
            </div>

            <!-- Key Performance Indicators -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mb-6" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                <!-- Total Letters -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">📄 Total Letters</p>
                                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalLetters }}</p>
                            </div>
                        </div>
                        <a href="{{ route('letters.index') }}" class="mt-4 inline-flex text-sm text-blue-600 hover:text-blue-800">
                            View all →
                        </a>
                    </div>
                </div>

                <!-- Letters Needing Response -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">⚠️ Pending Response</p>
                                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $lettersNeedingResponse }}</p>
                            </div>
                        </div>
                        @if ($lettersNeedingResponse > 0)
                            <div class="mt-4 h-2 bg-orange-100 rounded-full">
                                <div class="h-full bg-orange-500 rounded-full" style="width: {{ min(100, ($lettersNeedingResponse / max($totalLetters, 1)) * 100) }}%"></div>
                            </div>
                        @endif
                        <a href="{{ route('letters.index', ['filter' => 'pending-response']) }}" class="mt-4 inline-flex text-sm text-blue-600 hover:text-blue-800">
                            View pending →
                        </a>
                    </div>
                </div>

                <!-- Confidential Letters -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">🔒 Confidential</p>
                                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $confidentialLetters }}</p>
                            </div>
                        </div>
                        <a href="{{ route('letters.index', ['filter' => 'confidential']) }}" class="mt-4 inline-flex text-sm text-blue-600 hover:text-blue-800">
                            View confidential →
                        </a>
                    </div>
                </div>

                <!-- Total Work Packages (Admin only) -->
                @if ($adminMetrics)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">📦 Work Packages</p>
                                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $adminMetrics['total_work_packages'] }}</p>
                                </div>
                            </div>
                            <a href="{{ route('work-packages.index') }}" class="mt-4 inline-flex text-sm text-blue-600 hover:text-blue-800">
                            View all →
                        </a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Admin Metrics Section -->
            @if ($adminMetrics)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">System Overview</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
                        <!-- Total Users -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <p class="text-gray-500 text-sm font-medium">Total Users</p>
                                <p class="text-2xl font-bold text-gray-900 mt-2">{{ $adminMetrics['total_users'] }}</p>
                                <p class="text-xs text-green-600 mt-2">{{ $adminMetrics['active_users'] }} active</p>
                            </div>
                        </div>

                        <!-- Total Companies -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <p class="text-gray-500 text-sm font-medium">Total Companies</p>
                                <p class="text-2xl font-bold text-gray-900 mt-2">{{ $adminMetrics['total_companies'] }}</p>
                            </div>
                        </div>

                        <!-- Total Tags -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <p class="text-gray-500 text-sm font-medium">Total Tags</p>
                                <p class="text-2xl font-bold text-gray-900 mt-2">{{ $adminMetrics['total_tags'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Stats -->
                @if ($systemStats)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Activity</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <p class="text-gray-500 text-sm font-medium">Letters This Week</p>
                                    <p class="text-2xl font-bold text-gray-900 mt-2">{{ $systemStats['letters_this_week'] }}</p>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <p class="text-gray-500 text-sm font-medium">Letters This Month</p>
                                    <p class="text-2xl font-bold text-gray-900 mt-2">{{ $systemStats['letters_this_month'] }}</p>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <p class="text-gray-500 text-sm font-medium">Avg Response Time</p>
                                    <p class="text-2xl font-bold text-gray-900 mt-2">{{ $systemStats['avg_response_time'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            <!-- Recent Activity Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Letters -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Letters</h3>
                        <a href="{{ route('letters.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View All</a>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @if ($recentLetters->count())
                            @foreach ($recentLetters as $letter)
                                <div class="px-6 py-4 hover:bg-gray-50">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <a href="{{ route('letters.show', $letter) }}" class="text-sm font-medium text-gray-900 hover:text-blue-600">
                                                {{ Str::limit($letter->subject, 40) }}
                                            </a>
                                            <p class="text-xs text-gray-500 mt-1">
                                                From: {{ $letter->senderCompany?->name ?? 'Unknown' }}
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                Date: {{ $letter->docdate?->format('M d, Y') ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            @if ($letter->replyreq)
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                    Response needed
                                                </span>
                                            @endif
                                            @if ($letter->confidential)
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 ml-2">
                                                    Confidential
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="px-6 py-4 text-center text-gray-500">
                                No recent letters
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Top Work Packages -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-900">Top Work Packages</h3>
                        <a href="{{ route('work-packages.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View All</a>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @if ($lettersByWorkPackage->count())
                            @foreach ($lettersByWorkPackage as $wp)
                                <div class="px-6 py-4 hover:bg-gray-50">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <a href="{{ route('work-packages.show', $wp) }}" class="text-sm font-medium text-gray-900 hover:text-blue-600">
                                                {{ $wp->name }}
                                            </a>
                                            <p class="text-xs text-gray-500 mt-1">Reference: {{ $wp->reference ?? 'N/A' }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-bold text-gray-900">{{ $wp->letters_count }}</p>
                                            <p class="text-xs text-gray-500">letters</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="px-6 py-4 text-center text-gray-500">
                                No work packages yet
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Top Companies (Senders) -->
            @if ($lettersByCompany->count())
                <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-900">Most Active Senders (Companies)</h3>
                        <a href="{{ route('companies.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Letters Sent</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($lettersByCompany as $company)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            <a href="{{ route('companies.show', $company) }}" class="hover:text-blue-600">
                                                {{ $company->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-900">
                                            {{ $company->sent_letters_count }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
