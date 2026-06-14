<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CoCoMS: Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Hero Section -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
                <div class="text-center">
                    <img src="{{ asset('img/main.png') }}" alt="CoCoMS" class="w-32 h-32 mx-auto mb-6">
                    <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">CoCoMS</h1>
                    <p class="text-xl text-gray-600 mb-8">Construction Correspondence Management System</p>
                    
                    @if (!auth()->check())
                        <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-base text-white hover:bg-blue-700 transition-colors">
                            Sign In
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-base text-white hover:bg-blue-700 transition-colors">
                            Go to Dashboard
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Grid of Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- What is CoCoMS? -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">What is CoCoMS?</h3>
                        </div>
                        <div class="px-6 py-4 text-gray-700">
                            <p class="leading-relaxed mb-4">
                                CoCoMS is a simple Document Management System designed specifically for the management of correspondence generated during the execution of a construction project. It helps teams organize, track, and manage all project communications in one centralized location.
                            </p>
                            <a href="{{ route('page', 'what-is-cocoms') }}" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                                Learn more →
                            </a>
                        </div>
                    </div>

                    <!-- How to Use -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">How to Use?</h3>
                        </div>
                        <div class="px-6 py-4 text-gray-700">
                            <p class="mb-3">
                                <span class="font-semibold">Access is restricted to authorized registered users.</span>
                            </p>
                            <p class="mb-3">
                                Please contact the system's administrator if you believe you should have access to CoCoMS.
                            </p>
                            @if (!auth()->check())
                                <p>
                                    If you are an authorized registered user, please <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">login here</a>.
                                </p>
                            @else
                                <p>
                                    You are logged in. Visit the <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 font-semibold">dashboard</a> to get started.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                @if (auth()->check())
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Documentation</h3>
                        </div>
                        <div class="px-6 py-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <a href="{{ route('page', 'user-roles') }}" class="flex items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors border border-indigo-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">User Roles</h4>
                                        <p class="text-sm text-gray-600">Understand role permissions</p>
                                    </div>
                                    <span class="text-indigo-600 text-xl">→</span>
                                </a>
                                
                                <a href="{{ route('page', 'letter-naming') }}" class="flex items-center p-4 bg-cyan-50 rounded-lg hover:bg-cyan-100 transition-colors border border-cyan-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">Letter Naming</h4>
                                        <p class="text-sm text-gray-600">Letter naming convention</p>
                                    </div>
                                    <span class="text-cyan-600 text-xl">→</span>
                                </a>
                                
                                <a href="{{ route('page', 'work-breakdown-structure') }}" class="flex items-center p-4 bg-teal-50 rounded-lg hover:bg-teal-100 transition-colors border border-teal-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">WBS</h4>
                                        <p class="text-sm text-gray-600">Work breakdown structure</p>
                                    </div>
                                    <span class="text-teal-600 text-xl">→</span>
                                </a>

                                <a href="{{ route('page', 'history') }}" class="flex items-center p-4 bg-amber-50 rounded-lg hover:bg-amber-100 transition-colors border border-amber-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">History</h4>
                                        <p class="text-sm text-gray-600">Development timeline</p>
                                    </div>
                                    <span class="text-amber-600 text-xl">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Features Section -->
                @if (auth()->check())
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Quick Access</h3>
                        </div>
                        <div class="px-6 py-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <a href="{{ route('letters.index') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors border border-blue-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">Letters</h4>
                                        <p class="text-sm text-gray-600">Manage project letters</p>
                                    </div>
                                    <span class="text-blue-600 text-xl">→</span>
                                </a>
                                
                                <a href="{{ route('work-packages.index') }}" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors border border-green-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">Work Packages</h4>
                                        <p class="text-sm text-gray-600">View work packages</p>
                                    </div>
                                    <span class="text-green-600 text-xl">→</span>
                                </a>
                                
                                <a href="{{ route('senders.index') }}" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors border border-purple-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">Senders</h4>
                                        <p class="text-sm text-gray-600">Manage senders</p>
                                    </div>
                                    <span class="text-purple-600 text-xl">→</span>
                                </a>
                                
                                <a href="{{ route('recipients.index') }}" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors border border-yellow-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">Recipients</h4>
                                        <p class="text-sm text-gray-600">Manage recipients</p>
                                    </div>
                                    <span class="text-yellow-600 text-xl">→</span>
                                </a>
                                
                                <a href="{{ route('tags.index') }}" class="flex items-center p-4 bg-pink-50 rounded-lg hover:bg-pink-100 transition-colors border border-pink-200">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">Tags</h4>
                                        <p class="text-sm text-gray-600">Organize with tags</p>
                                    </div>
                                    <span class="text-pink-600 text-xl">→</span>
                                </a>

                                @if (auth()->user()->isAdmin())
                                    <a href="{{ route('users.index') }}" class="flex items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors border border-red-200">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">Users</h4>
                                            <p class="text-sm text-gray-600">Manage users & roles</p>
                                        </div>
                                        <span class="text-red-600 text-xl">→</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>

