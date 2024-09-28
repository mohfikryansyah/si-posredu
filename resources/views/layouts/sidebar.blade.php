<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @role('MASYARAKAT')
            <li>
                <x-sidebar-link :href="route('dashboard.masyarakat')" :active="request()->routeIs(['pemeriksaan*', 'dashboard.masyarakat'])">
                    <i class="fa-solid fa-house w-5"></i>
                    <span class="ms-3">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
            @endrole

            @role('KADER')
            <li>
                <x-sidebar-link :href="route('dashboard.kader')" :active="request()->routeIs('dashboard.kader')">
                    <i class="fa-solid fa-house w-5"></i>
                    <span class="ms-3">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
            @endrole

            @role('ADMIN')
            <li>
                <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fa-solid fa-house w-5"></i>
                    <span class="ms-3">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
            @endrole

            @role(['ADMIN', 'KADER'])
            <li>
                <x-dropdown aria-controls="posyandu" data-collapse-toggle="posyandu">
                    <p class="text-gray-500 w-5">
                        <i class="fa-solid fa-hands-holding-child"></i>
                    </p>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-500">Posyandu</span>
                    <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-dropdown>
                <ul id="posyandu"
                    class="{{ Route::is(['ibu', 'pemeriksaanIbu*', 'anak', 'pemeriksaanAnak', 'tanpaPemeriksaanIbu', 'tanpaPemeriksaanAnak']) ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="{{ route('ibu') }}" :active="request()->routeIs('ibu')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Ibu Hamil') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanIbu') }}" :active="request()->routeIs('pemeriksaanIbu*')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Ibu Hamil') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('tanpaPemeriksaanIbu') }}" :active="request()->routeIs('tanpaPemeriksaanIbu*')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Ibu Hamil Tanpa Pemeriksaan') }}</span>
                            <span class="inline-flex items-center justify-center w-4 h-4 p-4 ms-3 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ count(App\Models\MissedPelayanans::where('entitas_type', 'Ibu')->get()) }}</span>
                        </x-dropdown-link>
                    </li>
                    <li class="border-t">
                        <x-dropdown-link href="{{ route('anak') }}" :active="request()->routeIs('anak')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Anak') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanAnak') }}" :active="request()->routeIs('pemeriksaanAnak')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Anak') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('tanpaPemeriksaanAnak') }}" :active="request()->routeIs('tanpaPemeriksaanAnak*')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Anak Tanpa Pemeriksaan') }}</span>
                            <span class="inline-flex items-center justify-center w-4 h-4 p-4 ms-3 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ count(App\Models\MissedPelayanans::where('entitas_type', 'Anak')->get()) }}</span>
                        </x-dropdown-link>
                    </li>
                </ul>
            </li>
            <li>
                <x-dropdown aria-controls="posremaja" data-collapse-toggle="posremaja">
                    <p class="text-gray-500 w-5">
                        <i class="fa-solid fa-people-robbery"></i>
                    </p>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-500">Posremaja</span>
                    <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-dropdown>
                <ul id="posremaja"
                    class="{{ Route::is(['remaja', 'pemeriksaanRemaja*', 'tanpaPemeriksaanRemaja']) ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="{{ route('remaja') }}" :active="request()->routeIs('remaja')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Remaja') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanRemaja') }}" :active="request()->routeIs('pemeriksaanRemaja*')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Remaja') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('tanpaPemeriksaanRemaja') }}" :active="request()->routeIs('tanpaPemeriksaanRemaja*')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Remaja Tanpa Pemeriksaan') }}</span>
                            <span class="inline-flex items-center justify-center w-4 h-4 p-4 ms-3 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ count(App\Models\MissedPelayanans::where('entitas_type', 'Remaja')->get()) }}</span>
                        </x-dropdown-link>
                    </li>
                </ul>
            </li>
            <li>
                <x-dropdown aria-controls="posbindu" data-collapse-toggle="posbindu">
                    <p class="text-gray-500 w-5">
                        <i class="fa-solid fa-person-cane"></i>
                    </p>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-500">Posbindu</span>
                    <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-dropdown>
                <ul id="posbindu"
                    class="{{ Route::is(['lansia', 'pemeriksaanLansia*', 'tanpaPemeriksaanLansia']) ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="{{ route('lansia') }}" :active="request()->routeIs('lansia')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Lansia') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanLansia') }}" :active="request()->routeIs('pemeriksaanLansia*')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Lansia') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('tanpaPemeriksaanLansia') }}" :active="request()->routeIs('tanpaPemeriksaanLansia*')">
                            <i class="fa-regular fa-circle w-5"></i>
                            <span class="ms-3">{{ __('Lansia Tanpa Pemeriksaan') }}</span>
                            <span class="inline-flex items-center justify-center w-4 h-4 p-4 ms-3 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ count(App\Models\MissedPelayanans::where('entitas_type', 'Lansia')->get()) }}</span>
                        </x-dropdown-link>
                    </li>
                </ul>
            </li>
        </ul>
        @endrole
        @role('ADMIN')
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <x-sidebar-link :href="route('employee.index')" :active="request()->routeIs('employee.index')">
                    <i class="fa-solid fa-hospital-user w-5"></i>
                    <span class="ms-3">{{ __('Petugas') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <x-sidebar-link :href="route('jadwal-pelayanan.index')" :active="request()->routeIs('jadwal-pelayanan.index')">
                    <i class="fa-regular fa-clock w-5"></i>
                    <span class="ms-3">{{ __('Jadwal Pelayanan') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <x-sidebar-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                    <i class="fa-solid fa-list w-5"></i>
                    <span class="ms-3">{{ __('Kategori') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('posts.index')" :active="request()->routeIs('posts*')">
                    <i class="fa-regular fa-newspaper w-5"></i>
                    <span class="ms-3">{{ __('Artikel') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('gallery.index')" :active="request()->routeIs('gallery*')">
                    <i class="fa-solid fa-camera w-5"></i>
                    <span class="ms-3">{{ __('Dokumentasi Kegiatan') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <x-sidebar-link :href="route('app-setting.index')" :active="request()->routeIs('app-setting.index')">
                    <i class="fa-solid fa-gears w-5"></i>
                    <span class="ms-3">{{ __('Pengaturan Aplikasi') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <x-sidebar-link :href="route('register')" :active="request()->routeIs('register')">
                    <i class="fa-solid fa-address-card"></i>
                    <span class="ms-3">{{ __('Registrasi Akun') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
        @endrole
    </div>
</aside>
