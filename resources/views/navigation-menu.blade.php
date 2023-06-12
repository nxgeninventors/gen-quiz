<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        {{-- <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg> --}}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M47.2094 44.4011L47.2751 44.2317C47.661 43.2358 48.133 42.2067 48.6447 41.1033C48.6783 41.0306 48.7122 40.9576 48.7462 40.8844C49.2221 39.8586 49.7256 38.7732 50.1846 37.6554C51.1689 35.2585 52 32.5958 52 29.6897C52 15.8826 40.8071 4.6897 27 4.6897C13.1929 4.6897 2 15.8826 2 29.6897C2 43.4968 13.1929 54.6897 27 54.6897C30.9113 54.6897 35.4212 53.4022 38.8013 51.78C41.3325 53.8562 43.3541 55.4147 44.9511 56.5371C46.6674 57.7434 48.0055 58.5281 49.0107 58.863C49.4902 59.0227 50.142 59.1681 50.7932 58.9753C51.6237 58.7293 52.065 58.0683 52.202 57.4182C52.316 56.8776 52.2343 56.3295 52.1382 55.9099C52.0346 55.4576 51.8695 54.9724 51.6789 54.4869C51.1963 53.2576 50.4014 51.6789 49.6323 50.1512C49.2367 49.3655 48.848 48.5934 48.512 47.8891C47.9895 46.7942 47.5821 45.8458 47.3637 45.1161C47.2622 44.777 47.2199 44.544 47.2094 44.4011ZM47.2071 44.3128C47.2076 44.3037 47.2082 44.2995 47.2084 44.2996C47.2087 44.2998 47.2084 44.3044 47.2071 44.3128Z" stroke-width="3" id="logo-outer"/>
                                            <path d="M43.592 38.972C43.904 38.972 44.144 39.116 44.312 39.404C44.504 39.692 44.6 40.088 44.6 40.592C44.6 41.528 44.372 42.272 43.916 42.824C42.572 44.432 41.264 45.56 39.992 46.208C38.744 46.856 37.232 47.18 35.456 47.18C34.208 47.18 33.056 47.024 32 46.712C30.944 46.4 29.66 45.932 28.148 45.308C26.852 44.756 25.7 44.312 24.692 43.976C23.588 45.176 22.592 46.016 21.704 46.496C20.816 46.952 19.88 47.18 18.896 47.18C17.576 47.18 16.52 46.88 15.728 46.28C14.936 45.656 14.54 44.852 14.54 43.868C14.54 43.124 14.78 42.44 15.26 41.816C15.764 41.192 16.46 40.7 17.348 40.34C18.236 39.98 19.268 39.8 20.444 39.8C21.116 39.8 21.62 39.812 21.956 39.836C26.66 33.98 30.908 27.8 34.7 21.296C32.636 20.936 30.536 20.756 28.4 20.756C25.64 20.756 23.612 21.08 22.316 21.728C21.044 22.352 20.408 23.348 20.408 24.716C20.408 25.124 20.456 25.472 20.552 25.76C20.648 26.048 20.792 26.384 20.984 26.768C21.2 27.2 21.308 27.512 21.308 27.704C21.308 28.184 21.08 28.592 20.624 28.928C20.192 29.24 19.688 29.396 19.112 29.396C18.512 29.396 18.02 29.216 17.636 28.856C17.18 28.448 16.808 27.896 16.52 27.2C16.256 26.48 16.124 25.676 16.124 24.788C16.124 21.98 17.288 19.904 19.616 18.56C21.944 17.216 25.016 16.544 28.832 16.544C30.728 16.544 32.66 16.652 34.628 16.868C36.62 17.084 38.48 17.432 40.208 17.912C40.928 18.104 41.408 18.38 41.648 18.74C41.888 19.076 42.008 19.52 42.008 20.072C42.008 20.72 41.84 21.224 41.504 21.584C41.168 21.944 40.7 22.124 40.1 22.124H39.848C37.256 26.348 34.628 30.404 31.964 34.292C29.828 37.388 28.328 39.488 27.464 40.592C28.856 40.904 30.068 41.192 31.1 41.456C32.372 41.792 33.392 42.044 34.16 42.212C34.952 42.356 35.636 42.428 36.212 42.428C37.604 42.428 38.792 42.2 39.776 41.744C40.784 41.264 41.732 40.508 42.62 39.476C42.908 39.14 43.232 38.972 43.592 38.972Z" id="logo-inner"/>
                                        </svg>
                                            
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M47.2094 44.4011L47.2751 44.2317C47.661 43.2358 48.133 42.2067 48.6447 41.1033C48.6783 41.0306 48.7122 40.9576 48.7462 40.8844C49.2221 39.8586 49.7256 38.7732 50.1846 37.6554C51.1689 35.2585 52 32.5958 52 29.6897C52 15.8826 40.8071 4.6897 27 4.6897C13.1929 4.6897 2 15.8826 2 29.6897C2 43.4968 13.1929 54.6897 27 54.6897C30.9113 54.6897 35.4212 53.4022 38.8013 51.78C41.3325 53.8562 43.3541 55.4147 44.9511 56.5371C46.6674 57.7434 48.0055 58.5281 49.0107 58.863C49.4902 59.0227 50.142 59.1681 50.7932 58.9753C51.6237 58.7293 52.065 58.0683 52.202 57.4182C52.316 56.8776 52.2343 56.3295 52.1382 55.9099C52.0346 55.4576 51.8695 54.9724 51.6789 54.4869C51.1963 53.2576 50.4014 51.6789 49.6323 50.1512C49.2367 49.3655 48.848 48.5934 48.512 47.8891C47.9895 46.7942 47.5821 45.8458 47.3637 45.1161C47.2622 44.777 47.2199 44.544 47.2094 44.4011ZM47.2071 44.3128C47.2076 44.3037 47.2082 44.2995 47.2084 44.2996C47.2087 44.2998 47.2084 44.3044 47.2071 44.3128Z" stroke-width="3" id="logo-outer"/>
                                            <path d="M43.592 38.972C43.904 38.972 44.144 39.116 44.312 39.404C44.504 39.692 44.6 40.088 44.6 40.592C44.6 41.528 44.372 42.272 43.916 42.824C42.572 44.432 41.264 45.56 39.992 46.208C38.744 46.856 37.232 47.18 35.456 47.18C34.208 47.18 33.056 47.024 32 46.712C30.944 46.4 29.66 45.932 28.148 45.308C26.852 44.756 25.7 44.312 24.692 43.976C23.588 45.176 22.592 46.016 21.704 46.496C20.816 46.952 19.88 47.18 18.896 47.18C17.576 47.18 16.52 46.88 15.728 46.28C14.936 45.656 14.54 44.852 14.54 43.868C14.54 43.124 14.78 42.44 15.26 41.816C15.764 41.192 16.46 40.7 17.348 40.34C18.236 39.98 19.268 39.8 20.444 39.8C21.116 39.8 21.62 39.812 21.956 39.836C26.66 33.98 30.908 27.8 34.7 21.296C32.636 20.936 30.536 20.756 28.4 20.756C25.64 20.756 23.612 21.08 22.316 21.728C21.044 22.352 20.408 23.348 20.408 24.716C20.408 25.124 20.456 25.472 20.552 25.76C20.648 26.048 20.792 26.384 20.984 26.768C21.2 27.2 21.308 27.512 21.308 27.704C21.308 28.184 21.08 28.592 20.624 28.928C20.192 29.24 19.688 29.396 19.112 29.396C18.512 29.396 18.02 29.216 17.636 28.856C17.18 28.448 16.808 27.896 16.52 27.2C16.256 26.48 16.124 25.676 16.124 24.788C16.124 21.98 17.288 19.904 19.616 18.56C21.944 17.216 25.016 16.544 28.832 16.544C30.728 16.544 32.66 16.652 34.628 16.868C36.62 17.084 38.48 17.432 40.208 17.912C40.928 18.104 41.408 18.38 41.648 18.74C41.888 19.076 42.008 19.52 42.008 20.072C42.008 20.72 41.84 21.224 41.504 21.584C41.168 21.944 40.7 22.124 40.1 22.124H39.848C37.256 26.348 34.628 30.404 31.964 34.292C29.828 37.388 28.328 39.488 27.464 40.592C28.856 40.904 30.068 41.192 31.1 41.456C32.372 41.792 33.392 42.044 34.16 42.212C34.952 42.356 35.636 42.428 36.212 42.428C37.604 42.428 38.792 42.2 39.776 41.744C40.784 41.264 41.732 40.508 42.62 39.476C42.908 39.14 43.232 38.972 43.592 38.972Z" id="logo-inner"/>
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
