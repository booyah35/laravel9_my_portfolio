<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @auth('web')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('ホーム') }}
                        </x-nav-link>
                        <x-nav-link :href="route('sch_event')" :active="request()->routeIs('sch_event')">
                            {{ __('イベントを探す') }}
                        </x-nav-link>
                        <x-nav-link :href="route('cfm_event')" :active="request()->routeIs('cfm_event')">
                            {{ __('マイイベントを確認する') }}
                        </x-nav-link>
                        <x-nav-link :href="route('mk_review')" :active="request()->routeIs('mk_review')">
                            {{ __('レビューをする') }}
                        </x-nav-link>
                        <x-nav-link :href="route('mk_event')" :active="request()->routeIs('mk_event')">
                            {{ __('イベントを作る') }}
                        </x-nav-link>
                        <x-nav-link :href="route('show_profile')" :active="request()->routeIs('show_profile')">
                            {{ __('プロフィール') }}
                        </x-nav-link>
                        <x-nav-link :href="route('index_follow_host')" :active="request()->routeIs('index_follow_host')">
                            {{ __('フォローリスト') }}
                        </x-nav-link>
                    @endauth
                    @auth('host')
                        <x-nav-link :href="route('host_top')" :active="request()->routeIs('host_top')">
                            {{ __('ホーム') }}
                        </x-nav-link>
                        <x-nav-link :href="route('host_sch_event')" :active="request()->routeIs('host_sch_event')">
                            {{ __('イベントを探す') }}
                        </x-nav-link>
                        <x-nav-link :href="route('host_mk_event')" :active="request()->routeIs('host_mk_event')">
                            {{ __('イベントを作る') }}
                        </x-nav-link>
                        <x-nav-link :href="route('host_cfm_event')" :active="request()->routeIs('host_cfm_event')">
                            {{ __('マイイベントを確認する') }}
                        </x-nav-link>
                        <x-nav-link :href="route('host_show_profile')" :active="request()->routeIs('host_show_profile')">
                            {{ __('プロフィール') }}
                        </x-nav-link>
                        <x-nav-link :href="route('index_follower')" :active="request()->routeIs('index_follower')">
                            {{ __('フォロワーリスト') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            @auth('web')
                                <div>{{ Auth::user()->name }}</div>
                            @endauth
                            @auth('host')
                                <div>{{ Auth::guard()->user()->name }}</div>
                            @endauth
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        @auth('web')
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('ログアウト') }}
                                </x-dropdown-link>
                            </form>
                        @endauth
                        @auth('host')
                            <form method="POST" action="{{ route('host_logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('host_logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('ログアウト') }}
                                </x-dropdown-link>
                            </form>
                        @endauth
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
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
            @auth('web')
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('ホーム') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sch_event')" :active="request()->routeIs('sch_event')">
                {{ __('イベントを探す') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cfm_event')" :active="request()->routeIs('cfm_event')">
                {{ __('マイイベントを確認する') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('mk_review')" :active="request()->routeIs('mk_review')">
                {{ __('レビューをする') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('mk_event')" :active="request()->routeIs('mk_event')">
                {{ __('イベントを作る') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('show_profile')" :active="request()->routeIs('show_profile')">
                {{ __('プロフィール') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('index_follow_host')" :active="request()->routeIs('index_follow_host')">
                {{ __('フォローリスト') }}
            </x-responsive-nav-link>
            @endauth
            @auth('host')
            <x-responsive-nav-link :href="route('host_top')" :active="request()->routeIs('host_top')">
                {{ __('ホーム') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('host_sch_event')" :active="request()->routeIs('host_sch_event')">
                {{ __('イベントを探す') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('host_mk_event')" :active="request()->routeIs('host_mk_event')">
                {{ __('イベントを作る') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('host_cfm_event')" :active="request()->routeIs('host_cfm_event')">
                {{ __('マイイベントを確認する') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('host_show_profile')" :active="request()->routeIs('host_show_profile')">
                {{ __('プロフィール') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('index_follower')" :active="request()->routeIs('index_follower')">
                {{ __('フォローリスト') }}
            </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth('web')
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
                @auth('host')
                <div class="font-medium text-base text-gray-800">{{ Auth::guard()->user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::guard()->user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
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
        </div>
    </div>
</nav>