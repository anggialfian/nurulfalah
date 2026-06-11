<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- 🔵 KIRI: LOGO -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" class="h-10 w-10 object-contain">

                    <div class="leading-tight">
                        <p class="font-bold text-gray-800 text-sm">
                            Sistem Informasi Keuangan
                        </p>
                        <p class="text-gray-600 text-xs">
                            Mushola Nurul Falah Cimanggis
                        </p>
                    </div>
                </a>
            </div>

            <!-- 🔴 KANAN: MENU + USER -->
            <div class="hidden sm:flex sm:items-center space-x-6">

                @auth
                    <x-nav-link :href="route('dashboard')">Dashboard</x-nav-link>

                    @if(auth()->user()->role == 'admin')
                        <x-nav-link :href="route('transactions.index')">Transaksi</x-nav-link>
                        <x-nav-link :href="route('kegiatan.index')">Kegiatan</x-nav-link>
                    @endif

                    <x-nav-link :href="route('laporan')">Laporan</x-nav-link>

                    <!-- USER DROPDOWN -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="text-sm text-gray-600">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <x-nav-link :href="route('login')">Login</x-nav-link>
                @endguest

            </div>

            <!-- 📱 HAMBURGER -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- 📱 MOBILE MENU -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            @auth
                <x-responsive-nav-link :href="route('dashboard')">
                    Dashboard
                </x-responsive-nav-link>

                @if(auth()->user()->role == 'admin')
                    <x-responsive-nav-link :href="route('transactions.index')">
                        Transaksi
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('kegiatan.index')">
                        Kegiatan
                    </x-responsive-nav-link>
                @endif

                <x-responsive-nav-link :href="route('laporan')">
                    Laporan
                </x-responsive-nav-link>
            @endauth

            @guest
                <x-responsive-nav-link :href="route('login')">
                    Login
                </x-responsive-nav-link>
            @endguest

        </div>

        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>
                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </x-responsive-nav-link>
                </form>
            </div>

        </div>
        @endauth

    </div>
</nav>