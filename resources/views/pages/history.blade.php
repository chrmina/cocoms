<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About CoCoMS - History</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Hero Section -->
        <div class="bg-white shadow-sm mb-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
                <div class="text-center">
                    <img src="{{ asset('img/main.png') }}" alt="CoCoMS" class="w-24 h-24 mx-auto mb-4">
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">CoCoMS History & Development</h1>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="py-12">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    <!-- Sidebar Navigation -->
                    <div class="lg:col-span-1">
                        <x-pages-navigation />
                    </div>

                    <!-- Main Content -->
                    <div class="lg:col-span-3 space-y-6">
                    <!-- Introduction -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Why CoCoMS?</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            CoCoMS was created to scratch an itch! The goal was to develop a simple yet powerful document management web-based system specifically designed for managing correspondence generated during construction project execution.
                        </p>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            The vision was to create a system that:
                        </p>
                        <ul class="list-disc list-inside space-y-2 text-gray-700">
                            <li>Can be used by the entire construction team</li>
                            <li>Has the ability to control access based on user roles</li>
                            <li>Is easily accessible using just a web browser</li>
                            <li>Has the ability to export data in Excel format for further analysis and presentation</li>
                        </ul>
                    </div>

                    <!-- Development Timeline -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Development Timeline</h2>
                        
                        <div class="relative">
                            <!-- Timeline Line -->
                            <div class="absolute left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-400 via-blue-500 to-green-500"></div>

                            <!-- Timeline Events -->
                            <div class="space-y-8 relative">
                                <!-- Event 1 -->
                                <div class="ml-16">
                                    <div class="absolute -left-8 top-0 w-9 h-9 rounded-full bg-white border-4 border-blue-500 flex items-center justify-center">
                                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                    </div>
                                    <div class="bg-blue-50 rounded p-4 border-l-4 border-blue-500">
                                        <h3 class="font-semibold text-gray-900">October 2016</h3>
                                        <p class="text-gray-700 mt-1">Development of CoCoMS started</p>
                                    </div>
                                </div>

                                <!-- Event 2 -->
                                <div class="ml-16">
                                    <div class="absolute -left-8 top-0 w-9 h-9 rounded-full bg-white border-4 border-blue-500 flex items-center justify-center">
                                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                    </div>
                                    <div class="bg-gray-50 rounded p-4 border-l-4 border-gray-400">
                                        <h3 class="font-semibold text-gray-900">December 2017 - Testing</h3>
                                        <p class="text-gray-700 mt-1">Final testing of version 1.0 of CoCoMS was completed</p>
                                    </div>
                                </div>

                                <!-- Event 3 -->
                                <div class="ml-16">
                                    <div class="absolute -left-8 top-0 w-9 h-9 rounded-full bg-white border-4 border-green-500 flex items-center justify-center">
                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    </div>
                                    <div class="bg-green-50 rounded p-4 border-l-4 border-green-500">
                                        <h3 class="font-semibold text-gray-900">December 2017 - Release</h3>
                                        <p class="text-gray-700 mt-1">Version 1.0 of CoCoMS was released on GitHub</p>
                                    </div>
                                </div>

                                <!-- Event 4 -->
                                <div class="ml-16">
                                    <div class="absolute -left-8 top-0 w-9 h-9 rounded-full bg-white border-4 border-purple-500 flex items-center justify-center">
                                        <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                                    </div>
                                    <div class="bg-purple-50 rounded p-4 border-l-4 border-purple-500">
                                        <h3 class="font-semibold text-gray-900">2025 - Laravel 12 Migration</h3>
                                        <p class="text-gray-700 mt-1">CoCoMS refactored to Laravel 12 for improved modern architecture and performance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team & Credits -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">The CoCoMS Team</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            CoCoMS was conceived and developed by <strong>Christakis Mina</strong>.
                        </p>
                        <div class="bg-blue-50 rounded p-4 border-l-4 border-blue-500">
                            <p class="text-gray-700">
                                It is made available as <strong>Free/Open Source Software (F/OSS)</strong> under the <strong>GPL License</strong>, allowing anyone to use, modify, and distribute it freely.
                            </p>
                        </div>
                    </div>

                    <!-- Key Milestones -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Key Features Over Time</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded p-4 border border-blue-200">
                                <h3 class="font-semibold text-gray-900 mb-2">V1.0 Foundation</h3>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>✓ Core document management</li>
                                    <li>✓ Role-based access control</li>
                                    <li>✓ Excel export functionality</li>
                                    <li>✓ Web-based interface</li>
                                </ul>
                            </div>
                            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded p-4 border border-purple-200">
                                <h3 class="font-semibold text-gray-900 mb-2">Laravel 12 Modernization</h3>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>✓ Modern PHP framework</li>
                                    <li>✓ Enhanced security</li>
                                    <li>✓ Improved performance</li>
                                    <li>✓ Contemporary UI/UX</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
