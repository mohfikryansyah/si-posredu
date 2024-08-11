{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
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

<div class="flex md:flex-row md:items-start items-center flex-col justify-center pl-5 md:pr-0 pr-5 gap-4">
    <div class="px-3">
        <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/assets/img/profiles/avatar-02.jpg"
            class="h-28 w-28 rounded-full" alt="">
    </div>
    <div class="w-full">
        <div class="flex md:flex-row flex-col justify-center lg:gap-0 gap-4">
            <div class="w-full md:text-start text-center">
                <h1 class="font-semibold text-xl">Fiqriansyah</h1>
                <h2 class="font-medium text-sm text-gray-500">Kader</h2>
                <h2 class="font-semibold text-sm ">Bergabung sejak : 8 Juni 2024</h2>
            </div>
            <div
                class="w-full md:border-l-2 border-l-0 border-t-2 md:border-t-0 border-dashed border-gray-300 pr-0 md:pl-5 md:pt-0 pt-5 md:pb-0 pb-5">
                <div class="md:max-w-lg max-w-full relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="pb-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Nama
                                </th>
                                <td class="pb-3">
                                    : <span class="text-orange-400">Mohamad Fiqriansyah Panu</span>
                                </td>
                            </tr>
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
                                    : <span class="text-gray-400">Gorontalo, 02 Maret 2021</span>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="pb-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Whatsapp
                                </th>
                                <td class="pb-3">
                                    : <span class="text-orange-400">081190142244</span>
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
                aria-selected="false">Dashboard</button>
        </li>
        <li class="me-2" role="presentation">
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
        </li>
    </ul>
</div>
