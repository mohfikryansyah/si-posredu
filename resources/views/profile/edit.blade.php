<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-full space-y-5">
            <div class="pt-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <div id="default-tab-content">
                        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            @include('profile.partials.update-password-form')
                        </div>
                        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            @include('profile.partials.delete-user-form')
                        </div>
                        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                    </div>
                </div>
            </div>



            {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
