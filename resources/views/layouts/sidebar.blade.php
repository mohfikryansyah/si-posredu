<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-sidebar border-r border-gray-200 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-sidebar dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fa-solid fa-house"></i>
                    <span class="ms-3">{{ __('Dashboard') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    <i class="fa-solid fa-address-card"></i>
                    <span class="ms-3">{{ __('Profile') }}</span>
                </x-sidebar-link>
            </li>
            <li>
                <x-dropdown aria-controls="posyandu" data-collapse-toggle="posyandu">
                    <p class="text-gray-500">
                        <i class="fa-solid fa-children"></i>
                    </p>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-500">Posyandu</span>
                    <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-dropdown>
                <ul id="posyandu" class="hidden py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="fiqri">Anak</x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="{{ route('ibu.index') }}">Ibu</x-dropdown-link>
                    </li>
                </ul>
            </li>
            <li>
                <x-dropdown aria-controls="posremaja" data-collapse-toggle="posremaja">
                    <p class="text-gray-500">
                        <i class="fa-solid fa-children"></i>
                    </p>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-500">Posremaja</span>
                    <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-dropdown>
                <ul id="posremaja" class="hidden py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="fiqri">Anak</x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="biling">Ibu</x-dropdown-link>
                    </li>
                </ul>
            </li>
            <li>
                <x-dropdown aria-controls="posbindu" data-collapse-toggle="posbindu">
                    <p class="text-gray-500">
                        <i class="fa-solid fa-children"></i>
                    </p>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-gray-500">Posbindu</span>
                    <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-dropdown>
                <ul id="posbindu" class="hidden py-2 space-y-2">
                    <li>
                        <x-dropdown-link href="fiqri">Anak</x-dropdown-link>
                    </li>
                    <li>
                        <x-dropdown-link href="biling">Ibu</x-dropdown-link>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
