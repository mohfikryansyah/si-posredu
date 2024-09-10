<x-app-layout>
    <div class="rounded-lg dark:border-gray-700 md:mt-14 mt-16">
        <header class="max-w-screen-lg bg-white rounded-lg shadow">
            <div class="py-6 px-4">
                <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </div>
        </header>
    </div>

    <div class="py-4">
        <div class="max-w-screen-lg space-y-5">
            <div class="pt-8 bg-white shadow rounded-lg">
                <div class="max-w-full">
                    @include('profile.partials.profile-information')
                </div>
            </div>

            <div class="bg-white shadow rounded-lg">
                <div class="max-w-full">
                    <div id="default-tab-content">
                        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="dashboard" role="tabpanel"
                            aria-labelledby="dashboard-tab">
                            @include('profile.partials.update-password-form')
                        </div>
                        {{-- <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="settings" role="tabpanel"
                            aria-labelledby="settings-tab">
                            @include('profile.partials.delete-user-form')
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:script>
        <script>
            function previewImage() {
            const image = document.querySelector('#fotoProfile');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.classList.add("block");

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        </script>
    </x-slot:script>
</x-app-layout>
