<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>What is CoCoMS?</title>
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
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">What is CoCoMS?</h1>
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
                    <!-- What is CoCoMS Section -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">What is CoCoMS?</h2>
                        <p class="text-gray-700 leading-relaxed">
                            CoCoMS is a simple yet powerful document management system designed specifically for the management of correspondence generated during the execution of a construction project. It provides a centralized platform for organizing, tracking, and managing all project communications in a systematic and efficient manner.
                        </p>
                    </div>

                    <!-- Target Users Section -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Target Users</h2>
                        <p class="text-gray-700 leading-relaxed">
                            CoCoMS is targeted at document controllers and key staff of a construction project. The system can be used by the staff of:
                        </p>
                        <ul class="list-disc list-inside mt-4 space-y-2 text-gray-700">
                            <li><strong>The Contractor</strong> - Project management and documentation teams</li>
                            <li><strong>The Engineer</strong> - Supervisory and technical staff</li>
                            <li><strong>The Employer</strong> - Project management and coordination staff</li>
                        </ul>
                    </div>

                    <!-- Key Features -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Key Features</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="text-2xl text-blue-600">✓</div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-semibold text-gray-900">Centralized Management</h3>
                                    <p class="text-sm text-gray-600">All project correspondence in one place</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="text-2xl text-blue-600">✓</div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-semibold text-gray-900">Role-Based Access</h3>
                                    <p class="text-sm text-gray-600">Fine-grained permission control</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="text-2xl text-blue-600">✓</div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-semibold text-gray-900">Easy Search</h3>
                                    <p class="text-sm text-gray-600">Find letters by keywords and filters</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="text-2xl text-blue-600">✓</div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-semibold text-gray-900">Excel Export</h3>
                                    <p class="text-sm text-gray-600">Export data for analysis and reports</p>
                                </div>
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
