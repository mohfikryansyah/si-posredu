<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fa-solid fa-house"></i>
                    <span class="ms-3">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
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
                <ul id="posyandu" class="{{ Route::is(['ibu', 'pemeriksaanIbu*', 'anak', 'pemeriksaanAnak']) ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="{{ route('ibu') }}" :active="request()->routeIs('ibu')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Ibu Hamil') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanIbu') }}" :active="request()->routeIs('pemeriksaanIbu*')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Ibu Hamil') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('anak') }}" :active="request()->routeIs('anak')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Anak') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanAnak') }}" :active="request()->routeIs('pemeriksaanAnak')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Anak') }}</span>
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
                <ul id="posremaja" class="{{ Route::is(['remaja', 'pemeriksaanRemaja*']) ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="{{ route('remaja') }}" :active="request()->routeIs('remaja')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Remaja') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanRemaja') }}" :active="request()->routeIs('pemeriksaanRemaja*')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Remaja') }}</span>
                        </x-dropdown-link>
                    </li>
                </ul>
            </li>
            <li>
                <x-dropdown aria-controls="posredu" data-collapse-toggle="posredu">
                    <p class="text-gray-500 w-5">
                        <i class="fa-solid fa-person-cane"></i>
                    </p>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-500">Posredu</span>
                    <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-dropdown>
                <ul id="posredu" class="{{ Route::is(['lansia', 'pemeriksaanLansia*']) ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="{{ route('lansia') }}" :active="request()->routeIs('lansia')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Lansia') }}</span>
                        </x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('pemeriksaanLansia') }}" :active="request()->routeIs('pemeriksaanLansia*')">
                            <i class="fa-regular fa-circle"></i>
                            <span class="ms-3">{{ __('Pemeriksaan Lansia') }}</span>
                        </x-dropdown-link>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
                <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    <i class="fa-solid fa-address-card"></i>
                    <span class="ms-3">{{ __('Profile') }}</span>
                </x-sidebar-link>
            </li>
        </ul>
    </div>
</aside>
