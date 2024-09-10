<!-- Modal Component -->
<x-modal name="show_lansia" id="show_lansia" :show="false" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Lansia</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2 sm:col-span-1">
                <label for="show_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama<span class="text-red-500">*</span></label>
                <x-text-input name="show_nama" id="show_nama"
                    class="{{ $errors->show_lansia->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Ketik Nama Lengkap" required value="{{ old('nama') }}"></x-text-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="show_nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK<span
                        class="text-red-500">*</span></label>
                <x-number-input name="show_nik" id="show_nik"
                    class="{{ $errors->show_lansia->has('nik') ? 'border-red-500' : 'border-gray-300' }}" required
                    value="{{ old('nik') }}"></x-number-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="show_tempat_tanggal_lahir"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                    Lahir<span class="text-red-500">*</span></label>
                <x-text-input name="show_tempat_tanggal_lahir" id="show_tempat_tanggal_lahir"
                    class="{{ $errors->show_lansia->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Contoh: Gorontalo, 11 April 2001" required
                    value="{{ old('tempat_tanggal_lahir') }}"></x-text-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="show_tanggal_pendaftaran"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pendaftaran<span
                        class="text-red-500">*</span></label>
                <x-date-input name="show_tanggal_pendaftaran" id="show_tanggal_pendaftaran"
                    class="{{ $errors->show_lansia->has('tanggal_pendaftaran') ? 'border-red-500' : 'border-gray-300' }}"
                    required value="{{ old('tanggal_pendaftaran') }}"></x-date-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="show_golongan_darah"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gol. Darah<span
                        class="text-red-500">*</span></label>
                <select id="show_golongan_darah" name="show_golongan_darah"
                    class="{{ $errors->show_lansia->has('golongan_darah') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                <label for="show_alamat"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                        class="text-red-500">*</span></label>
                <x-text-input name="show_alamat" id="show_alamat"
                    class="{{ $errors->show_lansia->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Ketik Alamat" required value="{{ old('alamat') }}"></x-text-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="show_no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    HP<span class="text-red-500">*</span></label>
                <x-number-input name="show_no_tlp" id="show_no_tlp"
                    class="{{ $errors->show_lansia->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="08xxxxxxxxxx" required value="{{ old('no_tlp') }}"></x-number-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="show_pekerjaan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan<span
                        class="text-red-500">*</span></label>
                <x-text-input name="show_pekerjaan" id="show_pekerjaan"
                    class="{{ $errors->show_lansia->has('pekerjaan') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Contoh: Petani" required value="{{ old('pekerjaan') }}"></x-text-input>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <x-save-button x-on:click="$dispatch('close')">
                {{ __('Tutup') }}
            </x-save-button>
        </div>
    </div>
</x-modal>
