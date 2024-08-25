<!-- Modal Component -->
<x-modal name="edit_ibu_hamil" id="edit_ibu_hamil" :show="$errors->edit_ibuHamil->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Ubah Data Ibu Hamil</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('ibu-hamil') }}" method="POST" class="mt-4">
            @method("PUT")
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <input type="hidden" name="id" id="edit_id" value="{{ old('id') }}">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <x-text-input name="nama" id="edit_nama"
                        class="{{ $errors->edit_ibuHamil->has('nama') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('nama', $mom->nama) }}"></x-text-input>
                    @error('nama', 'edit_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="penolong_persalinan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Penolong Persalinan<span class="text-red-500">*</span></label>
                    <x-text-input name="penolong_persalinan" id="edit_penolong_persalinan"
                        class="{{ $errors->edit_ibuHamil->has('penolong_persalinan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('penolong_persalinan', $mom->penolong_persalinan) }}"></x-text-input>
                    @error('penolong_persalinan', 'edit_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="usia_kehamilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Usia Kehamilan<span class="text-red-500">*</span></label>
                    <x-text-input name="usia_kehamilan" id="edit_usia_kehamilan"
                        class="{{ $errors->edit_ibuHamil->has('usia_kehamilan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('usia_kehamilan', $mom->usia_kehamilan) }}"></x-text-input>
                    @error('usia_kehamilan', 'edit_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nomor_kehamilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Hamil ke<span class="text-red-500">*</span></label>
                    <x-number-input name="nomor_kehamilan" id="edit_nomor_kehamilan"
                        class="{{ $errors->edit_ibuHamil->has('nomor_kehamilan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('nomor_kehamilan', $mom->nomor_kehamilan) }}"></x-number-input>
                    @error('nomor_kehamilan', 'edit_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="tanggal_persalinan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Persalinan<span
                            class="text-red-500">*</span></label>
                    <x-date-input id="edit_tanggal_persalinan" name="tanggal_persalinan" value="{{ old('tanggal_persalinan', $mom->tanggal_persalinan) }}"></x-date-input>
                    @error('tanggal_persalinan', 'edit_ibuHamil')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="kondisi_bayi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kondisi Bayi<span class="text-red-500">*</span></label>
                    <x-text-input name="kondisi_bayi" id="edit_kondisi_bayi"
                        class="{{ $errors->edit_ibuHamil->has('kondisi_bayi') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('kondisi_bayi', $mom->kondisi_bayi) }}"></x-text-input>
                    @error('kondisi_bayi', 'edit_ibuHamil')
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
