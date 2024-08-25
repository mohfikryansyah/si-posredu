<!-- Modal Component -->
<x-modal name="add_ibuHamil" id="add_ibuHamil" :show="$errors->add_ibuHamil->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Ibu Hamil</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('ibu-hamil') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <x-text-input name="nama" id="nama"
                        class="{{ $errors->add_ibuHamil->has('nama') ? 'border-red-500' : 'border-gray-300' }}" required value="{{ old('nama') }}"></x-text-input>
                    @error('nama', 'add_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="penolong_persalinan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Penolong Persalinan<span class="text-red-500">*</span></label>
                    <x-text-input name="penolong_persalinan" id="penolong_persalinan"
                        class="{{ $errors->add_ibuHamil->has('penolong_persalinan') ? 'border-red-500' : 'border-gray-300' }}" required value="{{ old('penolong_persalinan') }}"></x-text-input>
                    @error('penolong_persalinan', 'add_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="usia_kehamilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Usia Kehamilan<span class="text-red-500">*</span></label>
                    <x-text-input name="usia_kehamilan" id="usia_kehamilan"
                        class="{{ $errors->add_ibuHamil->has('usia_kehamilan') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('usia_kehamilan') }}"></x-text-input>
                    @error('usia_kehamilan', 'add_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nomor_kehamilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Hamil ke<span class="text-red-500">*</span></label>
                    <x-number-input name="nomor_kehamilan" id="nomor_kehamilan"
                        class="{{ $errors->add_ibuHamil->has('nomor_kehamilan') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('nomor_kehamilan') }}"></x-number-input>
                    @error('nomor_kehamilan', 'add_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="tanggal_persalinan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Persalinan<span
                            class="text-red-500">*</span></label>
                    <x-date-input id="tanggal_persalinan" name="tanggal_persalinan" value="{{ old('tanggal_persalinan') }}"></x-date-input>
                    @error('tanggal_persalinan', 'add_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="kondisi_bayi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kondisi Bayi<span class="text-red-500">*</span></label>
                    <x-text-input name="kondisi_bayi" id="kondisi_bayi"
                        class="{{ $errors->add_ibuHamil->has('kondisi_bayi') ? 'border-red-500' : 'border-gray-300' }}" required value="{{ old('kondisi_bayi') }}"></x-text-input>
                    @error('kondisi_bayi', 'add_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-save-button class="ms-3">
                    {{ __('Simpan') }}
                </x-save-button>
            </div>
        </form>
    </div>
</x-modal>
