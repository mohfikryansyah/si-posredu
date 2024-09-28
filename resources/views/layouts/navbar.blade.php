@php
    $entities = [
        'anak' => auth()->user()->anak->nama ?? null,
        'remaja' => auth()->user()->remaja->nama ?? null,
        'ibu' => auth()->user()->ibu->nama ?? null,
        'lansia' => auth()->user()->lansia->nama ?? null,
        'petugas' => auth()->user()->employee->nama ?? null,
    ];
@endphp

<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-orange-400 to-rose-400 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('home.index') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 me-3" alt="Posyandu Logo" />
                    <span
                        class="self-center text-xl font-semibold text-white sm:text-2xl whitespace-nowrap dark:text-white">SI-POSREDU</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    @role('MASYARAKAT')
                        <button type="button"
                            class="relative inline-flex items-center text-sm font-medium p-1 text-center bg-rose-500 text-white rounded-lg hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            aria-expanded="false" data-dropdown-toggle="notification">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                            <span class="sr-only">Notifications</span>
                            @if (!$ibuBelumPemeriksaan)
                                @if (Carbon\Carbon::now()->gt($jadwal->tanggal_pelayanan))
                                    <div
                                        class="absolute inline-flex items-center justify-center w-3 h-3 text-[0.6rem] font-bold text-white bg-red-500 border-2 border-white rounded-full -top-1 -end-1 dark:border-gray-900">
                                    </div>
                                @endif
                            @endif
                        </button>
                        {{-- @dd(Carbon\Carbon::now()->gt($jadwal->tanggal_pelayanan)) --}}
                        <div class="z-50 hidden max-w-sm my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="notification">
                            @if ($jadwal)
                                @if (Carbon\Carbon::now()->lt($jadwal->tanggal_pelayanan))
                                    <div class="px-4 py-3" role="menuNotification">
                                        <p class="text-sm text-gray-900 dark:text-white" role="none">
                                            Tidak ada pemberitahuan
                                        </p>
                                    </div>
                                @elseif (!$ibuBelumPemeriksaan)
                                    <div class="px-4 py-3" role="menuNotification">
                                        <p class="text-sm text-gray-900 dark:text-white" role="none">
                                            Pemberitahuan
                                        </p>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-300" role="none">
                                            Halo, {{ $entities[auth()->user()->tipe_entitas] ?? auth()->user()->name }}
                                        </p>
                                        <p class="text-sm text-gray-700">
                                            Anda tidak melakukan pemeriksaan pada bulan ini yang dijadwalkan pada
                                            {{ date_format(date_create($jadwal->tanggal_pelayanan), 'd F, Y') }}
                                        </p>
                                    </div>
                                @else
                                    <div class="px-4 py-3" role="menuNotification">
                                        <p class="text-sm text-gray-900 dark:text-white" role="none">
                                            Tidak ada pemberitahuan
                                        </p>
                                    </div>
                                @endif
                            @else
                                <div class="px-4 py-3" role="menuNotification">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        Tidak ada pemberitahuan
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endrole
                    <div class="ml-3">
                        <button type="button"
                            class="flex text-3xl bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            @if (auth()->user()->fotoProfile)
                                <img src="{{ asset('storage/' . auth()->user()->fotoProfile) }}"
                                    class="w-8 h-8 rounded-full img-preview object-cover" alt="user foto">
                            @else
                                <i class="fa-solid fa-circle-user"></i>
                            @endif
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ $entities[auth()->user()->tipe_entitas] ?? auth()->user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="{{ request()->routeIs('profile.edit') ? 'bg-gray-700 text-gray-100' : 'bg-transparent' }} block px-4 py-2 text-sm dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Pengaturan Akun</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
