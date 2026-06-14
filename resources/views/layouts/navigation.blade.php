<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ auth()->check() ? route('dashboard') : route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('letters.index')" :active="request()->routeIs('letters.*')">
                            {{ __('Letters') }}
                        </x-nav-link>
                        <x-nav-link :href="route('work-packages.index')" :active="request()->routeIs('work-packages.*')">
                            {{ __('Work Packages') }}
                        </x-nav-link>
                        <x-nav-link :href="route('senders.index')" :active="request()->routeIs('senders.*')">
                            {{ __('Senders') }}
                        </x-nav-link>
                        <x-nav-link :href="route('recipients.index')" :active="request()->routeIs('recipients.*')">
                            {{ __('Recipients') }}
                        </x-nav-link>
                        <x-nav-link :href="route('tags.index')" :active="request()->routeIs('tags.*')">
                            {{ __('Tags') }}
                        </x-nav-link>
                        @if (auth()->user()->isAdmin())
                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                                {{ __('Users') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 sm:gap-4">
                <!-- Documentation Dropdown (accessible to all) -->
                <x-dropdown align="left" width="w-80">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-600 hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                            {{ __('Docs') }}
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('page', 'what-is-cocoms')">
                            {{ __('What is CoCoMS?') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('page', 'user-roles')">
                            {{ __('User Roles') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('page', 'letter-naming')">
                            {{ __('Letter Naming') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('page', 'work-breakdown-structure')">
                            {{ __('Work Breakdown Structure') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('page', 'history')">
                            {{ __('History') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700 transition-colors">
                        Sign In
                    </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('letters.index')" :active="request()->routeIs('letters.*')">
                    {{ __('Letters') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('work-packages.index')" :active="request()->routeIs('work-packages.*')">
                    {{ __('Work Packages') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('senders.index')" :active="request()->routeIs('senders.*')">
                    {{ __('Senders') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('recipients.index')" :active="request()->routeIs('recipients.*')">
                    {{ __('Recipients') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tags.index')" :active="request()->routeIs('tags.*')">
                    {{ __('Tags') }}
                </x-responsive-nav-link>
                @if (auth()->user()->isAdmin())
                    <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                @endif
            @endauth

            <!-- Documentation Links (Mobile) -->
            <div class="px-3 pt-2 pb-1">
                <div class="text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Documentation') }}</div>
            </div>
            <x-responsive-nav-link :href="route('page', 'what-is-cocoms')">
                {{ __('What is CoCoMS?') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('page', 'user-roles')">
                {{ __('User Roles') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('page', 'letter-naming')">
                {{ __('Letter Naming') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('page', 'work-breakdown-structure')">
                {{ __('Work Breakdown Structure') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('page', 'history')">
                {{ __('History') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 py-2">
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700 transition-colors">
                        Sign In
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
