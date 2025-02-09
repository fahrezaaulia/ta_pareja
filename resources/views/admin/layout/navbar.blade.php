<nav class="fixed top-0 z-50 w-full text-white" style="background-color: #926537">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                @can('pemilik')
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                @endcan
                @can('tamu')
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                        type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden btn-nav">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                @endcan
                <a class="flex ms-2 md:me-24">
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">E-Hajatan</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    @auth
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                @can('pemilik')
                                    <p class="text-sm text-gray-900 dark:text-white">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">
                                        {{ Auth::user()->alamat }}
                                    </p>
                                @endcan
                                @can('tamu')
                                    <p class="text-sm text-gray-900 dark:text-white">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">
                                        {{ Auth::user()->alamat }}
                                    </p>
                                @endcan
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-medium text-gray-600 p-2 rounded me-4" style="background-color: #EEDDCC">Login</a>
                        <a href="{{ route('register') }}"
                            class="text-sm font-medium text-gray-600 p-2 rounded me-4" style="background-color: #EEDDCC">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

@can('pemilik')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0"
        style="background-color: #D9AD81" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto" style="background-color: #D9AD81">
            <ul class="space-y-2 font-medium">
                <li>
                    <span class="text-sm">Main</span>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group dashboard-link {{ Request::is('dashboard') ? 'dashboard-link' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tamu') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group dashboard-link {{ Request::is('dashboard/tamu') ? 'dashboard-link' : '' }}">
                        <i class="bi bi-people"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Tamu Undangan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.daftartamu') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group dashboard-link {{ Request::is('dashboard/bayar') ? 'dashboard-link' : '' }}">
                        <i class="bi bi-cash-coin"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Pembayaran Tamu</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endcan

@can('tamu')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0"
        style="background-color: #D9AD81" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto" style="background-color: #D9AD81">
            <ul class="space-y-2 font-medium">
                <li>
                    <span class="text-sm">Main</span>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group dashboard-link {{ Request::is('home/dashboard') ? 'dashboard-link' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <span class="text-sm">Tamu</span>
                    <a href="{{ route('dashboard.tamu') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group dashboard-link {{ Request::is('home/tamu') ? 'dashboard-link' : '' }}">
                        <i class="bi bi-people"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Tamu Undangan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.bayar') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group dashboard-link {{ Request::is('home/pembayaran') ? 'dashboard-link' : '' }}">
                        <i class="bi bi-bank"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Metode Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('history.transaction') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group dashboard-link {{ Request::is('home/pembayaran') ? 'dashboard-link' : '' }}">
                        <i class="bi bi-cash-coin"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Histori Pembayaran</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endcan
