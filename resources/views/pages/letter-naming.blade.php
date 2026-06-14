<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Letter Naming Convention - CoCoMS</title>
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
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">Letter Naming Convention</h1>
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
                        <p class="text-gray-700 leading-relaxed">
                            In order to keep things tidy and organized, it is strongly suggested that a letter naming convention is followed. It is assumed that the project is broken down into work packages (WP) and each WP is assigned a unique number.
                        </p>
                    </div>

                    <!-- Letter Naming Convention -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Letter Naming Convention</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            The naming convention for letters is:
                        </p>
                        <div class="bg-gray-50 rounded p-4 mb-6 border-l-4 border-blue-500">
                            <code class="text-lg font-mono text-gray-900"><strong>SENDER-RECIPIENT-WPNumber-TYPE-XXXXX</strong></code>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Where:</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="font-semibold text-gray-900">SENDER</h4>
                                <p class="text-gray-700">The sender's name. For example, if the sender is ACME Corporation, then SENDER will be <code class="bg-gray-100 px-2 py-1 rounded">ACME</code>.</p>
                            </div>
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="font-semibold text-gray-900">RECIPIENT</h4>
                                <p class="text-gray-700">The recipient's name. For example, if the recipient is Smith Corporation, then RECIPIENT will be <code class="bg-gray-100 px-2 py-1 rounded">SMITH</code>.</p>
                            </div>
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="font-semibold text-gray-900">WPNumber</h4>
                                <p class="text-gray-700">The unique number of the work package. For example, if the work package is 20000-Civil Works, then WPNumber will be <code class="bg-gray-100 px-2 py-1 rounded">20000</code>. Letters not related to any WP should use <code class="bg-gray-100 px-2 py-1 rounded">00000</code>.</p>
                            </div>
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="font-semibold text-gray-900">TYPE</h4>
                                <p class="text-gray-700">The correspondence type: Use <code class="bg-gray-100 px-2 py-1 rounded">L</code> for Letters, <code class="bg-gray-100 px-2 py-1 rounded">RFI</code> for Requests for Information, <code class="bg-gray-100 px-2 py-1 rounded">RFA</code> for Requests for Approval, etc.</p>
                            </div>
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="font-semibold text-gray-900">XXXXX</h4>
                                <p class="text-gray-700">A unique sequential number identifying the letter, e.g., <code class="bg-gray-100 px-2 py-1 rounded">000164</code>.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Examples -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Letter Name Examples</h2>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Example 1: Letter Related to a Work Package</h3>
                            <p class="text-gray-700 mb-3">
                                Assume a letter was sent from <strong>ACME Corporation</strong> to <strong>Smith Corporation</strong> regarding WP <strong>20000-Civil Works</strong>:
                            </p>
                            <div class="bg-green-50 rounded p-4 border border-green-200">
                                <p class="font-mono text-lg text-green-900"><strong>Letter Name:</strong> <code>ACME-SMITH-20000-L-00096</code></p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Example 2: Letter Not Related to Any Work Package</h3>
                            <p class="text-gray-700 mb-3">
                                Assume a letter was sent from <strong>Brown Corporation</strong> to <strong>Homer Corporation</strong> not related to any specific WP:
                            </p>
                            <div class="bg-green-50 rounded p-4 border border-green-200">
                                <p class="font-mono text-lg text-green-900"><strong>Letter Name:</strong> <code>BROWN-HOMER-00000-L-00243</code></p>
                            </div>
                        </div>
                    </div>

                    <!-- File Naming Convention -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">File Naming Convention</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            The letter files (e.g., PDF documents) should be given the same name as the letter name following the letter naming convention (<code class="bg-gray-100 px-2 py-1 rounded">SENDER-RECIPIENT-WPNumber-TYPE-XXXXX</code>).
                        </p>
                        <div class="bg-blue-50 rounded p-4 border-l-4 border-blue-500">
                            <p class="text-gray-700"><strong>Example:</strong> If the letter is named <code class="bg-white px-2 py-1 rounded">ACME-SMITH-20000-L-00096</code>, then the associated PDF file should be named:</p>
                            <p class="font-mono text-lg text-gray-900 mt-2"><strong><code>ACME-SMITH-20000-L-00096.pdf</code></strong></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
