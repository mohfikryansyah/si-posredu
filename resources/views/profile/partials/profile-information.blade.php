{{-- <div class="grid grid-cols-2 mb-10">
    <div class="px-8">
        <div class="flex gap-6">
            <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/assets/img/profiles/avatar-02.jpg"
                class="h-28 w-28 rounded-full" alt="">
            <div>
                <h1 class="font-bold text-xl">Fiqriansyah</h1>
                <h2 class="font-semibold text-sm text-gray-500">Kader</h2>
                <h2 class="font-semibold text-sm ">Bergabung sejak : 8 Juni 2024</h2>
            </div>
        </div>
    </div>
    <div class="md:border-l-2 border-l-0 border-t-2 md:border-t-0 border-dashed border-gray-300 pr-8 pl-5">
        <div class="flex gap-20">
            <div id="personal-information" class="space-y-3">
                <p class="font-semibold text-gray-700">Nama:</p>
                <p class="font-semibold text-gray-700">Tanggal Lahir:</p>
                <p class="font-semibold text-gray-700">Email:</p>
                <p class="font-semibold text-gray-700">Whatsapp:</p>
            </div>
            <div id="value-personal-information" class="space-y-3">
                <p class="font-normal text-orange-400">Mohamad Fiqriansyah Panu</p>
                <p class="font-normal text-gray-400">Gorontalo, 02 Maret 2021</p>
                <p class="font-normal text-orange-400">moh.fikryansyah@gmail.com</p>
                <p class="font-normal text-gray-400">081190142244</p>
            </div>
        </div>
    </div>
</div> --}}

@php
    $entities = [
        'anak' => auth()->user()->anak->nama ?? null,
        'remaja' => auth()->user()->remaja->nama ?? null,
        'ibu' => auth()->user()->ibu->nama ?? null,
        'lansia' => auth()->user()->lansia->nama ?? null,
        'petugas' => auth()->user()->employee->nama ?? null,
    ];
@endphp

<div class="flex md:flex-row md:items-start items-center flex-col justify-center pl-5 md:pr-0 pr-5 gap-4">
    <div class="w-36 md:h-32 h-36">
        @if (auth()->user()->fotoProfile)
            <img src="{{ asset('storage/' . auth()->user()->fotoProfile) }}" class="w-full h-full rounded-full img-preview object-cover"
                alt="">
        @else
            <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/assets/img/profiles/avatar-02.jpg"
                class="w-full h-full rounded-full img-preview" alt="">
        @endif
    </div>
    <div class="w-full">
        <div class="flex md:flex-row flex-col justify-center lg:gap-0 gap-4">
            <div class="w-full md:text-start text-center">
                <h1 class="font-semibold text-xl">{{ $entities[auth()->user()->tipe_entitas] ?? auth()->user()->name }}
                </h1>
                <h2 class="font-medium text-sm text-gray-500 capitalize">
                    {{ auth()->user()->tipe_entitas }}
                </h2>
                @if (isset($user->employee) && isset($user->employee->join))
                    <h2 class="font-medium text-gray-500 text-sm">Bergabung sejak: {{ $user->employee->join }}</h2>
                @endif
            </div>
            <div
                class="w-full md:border-l-2 border-l-0 border-t-2 md:border-t-0 border-dashed border-gray-300 pr-0 md:pl-5 md:pt-0 pt-5 md:pb-0 pb-5">
                <div class="md:max-w-lg max-w-full relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            {{-- <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="pb-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Nama
                                </th>
                                <td class="pb-3">
                                    : <span class="text-orange-400">Mohamad Fiqriansyah Panu</span>
                                </td>
                            </tr> --}}
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="pb-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Email
                                </th>
                                <td class="pb-3">
                                    : <span class="text-orange-400">moh.fikryansyah@gmail.com</span>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="pb-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Tanggal lahir
                                </th>
                                <td class="pb-3">
                                    : <span class="text-orange-400">Gorontalo, 02 Maret 2021</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
        data-tabs-toggle="#default-tab-content" role="tablist" data-tabs-active-classes="border-orange-400">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="me-2" role="presentation">
            <button
                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                aria-selected="false">Password</button>
        </li>
        {{-- <li class="me-2" role="presentation">
            <button
                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                aria-selected="false">Settings</button>
        </li>
        <li role="presentation">
            <button
                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                aria-selected="false">Contacts</button>
        </li> --}}
    </ul>
</div>
