<!-- Pages Navigation Sidebar -->
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Documentation</h3>
    <nav class="space-y-2">
        <a href="{{ route('home') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
            🏠 Home
        </a>
        <a href="{{ route('page', 'what-is-cocoms') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('page') && request()->route('page') === 'what-is-cocoms' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
            ℹ️ What is CoCoMS?
        </a>
        <a href="{{ route('page', 'user-roles') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('page') && request()->route('page') === 'user-roles' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
            👥 User Roles
        </a>
        <a href="{{ route('page', 'letter-naming') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('page') && request()->route('page') === 'letter-naming' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
            📋 Letter Naming
        </a>
        <a href="{{ route('page', 'work-breakdown-structure') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('page') && request()->route('page') === 'work-breakdown-structure' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
            📊 Work Breakdown
        </a>
        <a href="{{ route('page', 'history') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('page') && request()->route('page') === 'history' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
            📚 History
        </a>
    </nav>
</div>
