<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Roles - CoCoMS</title>
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
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">User Roles</h1>
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
                            In order to properly manage the data in CoCoMS and avoid accidental deletions and system abuses, users are given different access control via a role scheme. There are three types of users in CoCoMS: Viewers, Editors, and Administrators.
                        </p>
                    </div>

                    <!-- User Roles -->
                    <div class="space-y-4">
                        <!-- Viewer Role -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-blue-500 text-white">
                                        👁️
                                    </div>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">Viewers (Registered Users)</h3>
                                    <p class="mt-2 text-gray-700 leading-relaxed">
                                        Registered users can be added only by an administrator. Once active, a registered user can only <strong>view</strong> all CoCoMS data. A registered user cannot add, edit, or delete any data in CoCoMS, except modifying their own profile data.
                                    </p>
                                    <div class="mt-3 pt-3 border-t border-gray-200">
                                        <p class="text-sm text-gray-600"><strong>Permissions:</strong> View only</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Editor Role -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-green-500 text-white">
                                        ✏️
                                    </div>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">Editors</h3>
                                    <p class="mt-2 text-gray-700 leading-relaxed">
                                        Editors can be added only by an administrator. Once active, an editor can <strong>view, add, edit, and delete</strong> all data in CoCoMS. An editor can only edit their own profile data and cannot manage other users' profiles.
                                    </p>
                                    <div class="mt-3 pt-3 border-t border-gray-200">
                                        <p class="text-sm text-gray-600"><strong>Permissions:</strong> Full CRUD on documents, limited user management</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Administrator Role -->
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-red-500 text-white">
                                        🔐
                                    </div>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">Administrators</h3>
                                    <p class="mt-2 text-gray-700 leading-relaxed">
                                        Administrators have <strong>full access</strong> to all data in CoCoMS. They can view, add, edit, and delete any data and can create, modify, or delete user accounts and assign roles.
                                    </p>
                                    <div class="mt-3 pt-3 border-t border-gray-200">
                                        <p class="text-sm text-gray-600"><strong>Permissions:</strong> Full system access including user management</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Access Control Summary -->
                    <div class="bg-blue-50 rounded-lg shadow-sm p-6 border border-blue-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Access Control Summary</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-blue-200">
                                        <th class="text-left py-2 px-2 font-semibold text-gray-900">Action</th>
                                        <th class="text-center py-2 px-2 font-semibold text-gray-900">Viewer</th>
                                        <th class="text-center py-2 px-2 font-semibold text-gray-900">Editor</th>
                                        <th class="text-center py-2 px-2 font-semibold text-gray-900">Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-blue-100">
                                        <td class="py-2 px-2 text-gray-700">View Documents</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                    </tr>
                                    <tr class="border-b border-blue-100">
                                        <td class="py-2 px-2 text-gray-700">Create Documents</td>
                                        <td class="text-center py-2 px-2">✗</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                    </tr>
                                    <tr class="border-b border-blue-100">
                                        <td class="py-2 px-2 text-gray-700">Edit Documents</td>
                                        <td class="text-center py-2 px-2">✗</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                    </tr>
                                    <tr class="border-b border-blue-100">
                                        <td class="py-2 px-2 text-gray-700">Delete Documents</td>
                                        <td class="text-center py-2 px-2">✗</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-2 text-gray-700">Manage Users</td>
                                        <td class="text-center py-2 px-2">✗</td>
                                        <td class="text-center py-2 px-2">✗</td>
                                        <td class="text-center py-2 px-2">✓</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
