<!-- Modal Component -->
<x-modal name="show_ibu" id="show_ibu" :show="false" maxWidth="2xl">
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Data Ibu Hamil</h2>
        <p class="mt-4 text-sm text-gray-600">
            Anda tidak dapat melakukan perubahan atau penghapusan data pada halaman ini.
        </p>

        <div class="mt-4">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <x-text-input disabled name="nama" id="show_nama"
                        class="{{ $errors->show_ibu->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik Nama Ibu" required value="{{ old('nama') }}"></x-text-input>
                    @error('nama', 'show_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_nama_suami" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Suami<span class="text-red-500">*</span></label>
                    <x-text-input disabled name="nama_suami" id="show_nama_suami"
                        class="{{ $errors->show_ibu->has('nama_suami') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik Nama Suami" required value="{{ old('nama_suami') }}"></x-text-input>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_tempat_tanggal_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                        Lahir<span class="text-red-500">*</span></label>
                    <x-text-input disabled name="tempat_tanggal_lahir" id="show_tempat_tanggal_lahir"
                        class="{{ $errors->show_ibu->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Contoh: Gorontalo, 11 April 2001" required
                        value="{{ old('tempat_tanggal_lahir') }}"></x-text-input>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="nik" id="show_nik"
                        class="{{ $errors->show_ibu->has('nik') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('nik') }}"></x-number-input>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                            class="text-red-500">*</span></label>
                    <x-text-input disabled name="alamat" id="show_alamat"
                        class="{{ $errors->show_ibu->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik Alamat" required value="{{ old('alamat') }}"></x-text-input>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_tanggal_pendaftaran"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pendaftaran<span
                            class="text-red-500">*</span></label>
                    <x-date-input disabled name="tanggal_pendaftaran" id="show_tanggal_pendaftaran"
                        class="{{ $errors->edit_ibu->has('tanggal_pendaftaran') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('tanggal_pendaftaran') }}"></x-date-input>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan<span
                            class="text-red-500">*</span></label>
                    <x-text-input disabled name="pekerjaan" id="show_pekerjaan"
                        class="{{ $errors->show_ibu->has('pekerjaan') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Contoh: Petani" required value="{{ old('pekerjaan') }}"></x-text-input>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_golongan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gol. Darah<span
                            class="text-red-500">*</span></label>
                    <select disabled id="show_golongan_darah" name="golongan_darah"
                        class="{{ $errors->show_ibu->has('golongan_darah') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled selected>Pilih</option>
                        @foreach ($golongan_darah as $goldar)
                            @if (old('golongan_darah') === $goldar)
                                <option value="{{ $goldar }}" selected>{{ $goldar }}</option>
                            @else
                                <option value="{{ $goldar }}">{{ $goldar }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        HP<span class="text-red-500">*</span></label>
                    <x-number-input disabled name="no_tlp" id="show_no_tlp"
                        class="{{ $errors->show_ibu->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="08xxxxxxxxxx" required value="{{ old('no_tlp') }}"></x-number-input>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="show_nomor_kehamilan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kehamilan Ke<span
                            class="text-red-500">*</span></label>
                    <x-text-input disabled name="nomor_kehamilan" id="show_nomor_kehamilan"
                        class="{{ $errors->show_ibu->has('nomor_kehamilan') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('nomor_kehamilan') }}"></x-text-input>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-danger-button x-on:click="$dispatch('close')">
                    {{ __('Tutup') }}
                </x-danger-button>
            </div>
        </div>
    </div>
</x-modal>
