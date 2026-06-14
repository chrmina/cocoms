<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Work Breakdown Structure - CoCoMS</title>
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
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">Work Breakdown Structure (WBS)</h1>
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
                    <!-- General Info -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">General Information</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            It is assumed that the construction project is organized in work packages (WP) following the Work Breakdown Structure (WBS) method.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            A WP is the smallest unit of a Work Breakdown Structure and consists of a group of related tasks within a project. The idea is to break down the project deliverables into smaller, more manageable chunks of work in order to be better scheduled, cost estimated, monitored, and controlled.
                        </p>
                    </div>

                    <!-- Work Package Overview -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Work Package Overview</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-blue-50 rounded p-4 border border-blue-200">
                                <h3 class="font-semibold text-gray-900 mb-2">What are Work Packages?</h3>
                                <p class="text-gray-700 text-sm">
                                    WPs are typically grouped based on geographical area, engineering discipline, technology, or time needed for completion. You can visualize WP as mini-projects within the whole project.
                                </p>
                            </div>
                            <div class="bg-green-50 rounded p-4 border border-green-200">
                                <h3 class="font-semibold text-gray-900 mb-2">Benefits of WBS</h3>
                                <p class="text-gray-700 text-sm">
                                    Work can be done simultaneously by different team members, leading to better team productivity and easier project management overall.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- WBS Method -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">The WBS Method</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            The WBS is a method for getting a complex, multi-step project done. It's a way to divide and conquer large projects so you can get things done faster and more efficiently.
                        </p>
                        <div class="bg-purple-50 rounded p-4 border-l-4 border-purple-500">
                            <p class="text-gray-700">
                                WBS is a <strong>hierarchical tree structure</strong> that outlines your project and breaks it down into smaller, more manageable portions. Breaking the project down into work packages means work can be done simultaneously by different team members, leading to better team productivity and easier project management overall.
                            </p>
                        </div>
                    </div>

                    <!-- Letters and WBS -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Letters and WBS in CoCoMS</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            CoCoMS assumes that letters are issued in relation to work packages. As such, letters are named and organized accordingly.
                        </p>
                        <div class="bg-orange-50 rounded p-4 border border-orange-200">
                            <p class="text-gray-700">
                                For details regarding the letter naming convention and how letters are organized by work package, please refer to the <a href="{{ route('page', 'letter-naming') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Letter Naming Convention</a> page.
                            </p>
                        </div>
                    </div>

                    <!-- Key Concepts -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Key Concepts</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-md bg-blue-500 text-white text-sm font-semibold">1</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900">Decomposition</h3>
                                    <p class="text-gray-700">Breaking down large project scope into smaller, manageable work packages</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-md bg-green-500 text-white text-sm font-semibold">2</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900">Organization</h3>
                                    <p class="text-gray-700">Organizing work packages hierarchically for clear project structure</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-md bg-purple-500 text-white text-sm font-semibold">3</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900">Management</h3>
                                    <p class="text-gray-700">Managing correspondence and documents by associated work package</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-8 w-8 rounded-md bg-red-500 text-white text-sm font-semibold">4</div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900">Control</h3>
                                    <p class="text-gray-700">Monitoring and controlling progress across all work packages</p>
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
