<x-app-layout>

    <div class="max-w-3xl md:mt-0 mt-5">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <h1 class="bg-orange-400 px-5 py-2.5 text-gray-100 font-medium">Ubah Pengaturan Aplikasi</h1>
            <div class="p-5">
                <form action="{{ route('app-setting.update', ['id' => $app['id']]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="md:grid grid-cols-3 md:gap-x-5">

                        <div class="mb-5 col-span-full">
                            <label for="app_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Aplikasi</label>
                            <x-text-input name="app_name" id="app_name"
                                class="{{ $errors->edit_app->has('app_name', $app['app_name']) ? 'border-red-500' : 'border-gray-300' }}"
                                value="{{ $app['app_name'] }}"></x-text-input>
                            @error('app_name', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5 col-span-full">
                            <label for="visi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi</label>
                            <textarea rows="4"
                                class="{{ $errors->edit_app->has('visi') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                name="visi" id="visi" placeholder="visi singkat tentang layanan">{{ old('visi', $app['visi']) }}</textarea>
                            @error('visi', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5 col-span-full">
                            <label for="misi1"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Misi1</label>
                            <textarea rows="4"
                                class="{{ $errors->edit_app->has('misi1') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                name="misi1" id="misi1" placeholder="misi1 singkat tentang layanan">{{ old('visi', $app['visi']) }}</textarea>
                            @error('misi1', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5 col-span-full">
                            <label for="misi2"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Misi2</label>
                            <textarea rows="4"
                                class="{{ $errors->edit_app->has('misi2') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                name="misi2" id="misi2" placeholder="misi2 singkat tentang layanan">{{ old('visi', $app['visi']) }}</textarea>
                            @error('misi2', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5 col-span-full">
                            <label for="misi3"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Misi3</label>
                            <textarea rows="4"
                                class="{{ $errors->edit_app->has('misi3') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                name="misi3" id="misi3" placeholder="misi3 singkat tentang layanan">{{ old('visi', $app['visi']) }}</textarea>
                            @error('misi3', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5 col-span-1">
                            <label for="lokasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <x-text-input name="lokasi" id="lokasi"
                                class="{{ $errors->edit_app->has('lokasi', $app['lokasi']) ? 'border-red-500' : 'border-gray-300' }}"
                                value="{{ $app['lokasi'] }}"></x-text-input>
                            @error('lokasi', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5 col-span-1">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <x-text-input name="email" id="email"
                                class="{{ $errors->edit_app->has('email', $app['email']) ? 'border-red-500' : 'border-gray-300' }}"
                                value="{{ $app['email'] }}"></x-text-input>
                            @error('email', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5 col-span-1">
                            <label for="no_tlp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                Telepon/Whatsapp</label>
                            <x-number-input name="no_tlp" id="no_tlp"
                                class="{{ $errors->edit_app->has('no_tlp', $app['no_tlp']) ? 'border-red-500' : 'border-gray-300' }}"
                                value="{{ $app['no_tlp'] }}"></x-number-input>
                            @error('no_tlp', 'edit_app')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <x-save-button>Simpan</x-save-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
