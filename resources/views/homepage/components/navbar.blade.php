<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center">
            {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Admaka</span> --}}
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ Route('landingpage') }}"
                        class="block py-2 pl-3 pr-4 rounded md:p-0 {{ Route::is('landingpage') ? 'active' : 'inactive' }} "
                        aria-current="page">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ (auth()->check())?url('cek-status-surat'):Route('cekstatus') }}" class="block py-2 pl-3 pr-4 rounded md:p-0 {{ Route::is('cekstatus') ? 'active' : 'inactive' }}">
                        Cek Status
                    </a>
                </li>
                <li>
                    <a href="{{ Route('dashboard') }}"
                        class="block py-2 pl-3 pr-4 rounded md:p-0 inactive">
                        @if (auth()->check())
                            @if (auth()->user()->role === 'dekan')
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();this.closest('form').submit();" class="nav-link">
                                    <i class="nav-icon fas fa-columns"></i>Logout
                                </a>
                            </form>                            
                            @elseif (auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin')
                            {{'Admin Dashboard'}}
                            @endif
                        @else
                        {{'Login'}}
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>