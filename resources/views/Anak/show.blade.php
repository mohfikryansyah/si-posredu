<!-- Modal Component -->
<x-modal name="show_anak" id="show_anak" :show="false" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Lihat Data Anak</h2>
        <p class="mt-2 text-sm text-gray-600">
            Anda tidak dapat melakukan perubahan atau penghapusan data pada halaman ini.
        </p>

        <div class="grid gap-4 mb-4 grid-cols-2 mt-3">
            <div class="col-span-2 sm:col-span-1">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama<span class="text-red-500">*</span></label>
                <x-text-input readonly name="nama" id="show_nama"
                    class="{{ $errors->show_anak->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Ketik nama anak" required value="{{ old('nama') }}"></x-text-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="tempat_tanggal_lahir"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                    Lahir<span class="text-red-500">*</span></label>
                <x-text-input name="tempat_tanggal_lahir" id="show_tempat_tanggal_lahir"
                    class="{{ $errors->show_anak->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Contoh: Gorontalo, 11 April 2001" required
                    value="{{ old('tempat_tanggal_lahir') }}"></x-text-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK<span
                        class="text-red-500">*</span></label>
                <x-number-input name="nik" id="show_nik"
                    class="{{ $errors->show_anak->has('nik') ? 'border-red-500' : 'border-gray-300' }}" required
                    value="{{ old('nik') }}"></x-number-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="nama_ibu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Ibu<span class="text-red-500">*</span></label>
                <x-text-input name="nama_ibu" id="show_nama_ibu"
                    class="{{ $errors->show_anak->has('nama_ibu') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Ketik nama ibu" required value="{{ old('nama_ibu') }}"></x-text-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="nama_ayah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Ayah<span class="text-red-500">*</span></label>
                <x-text-input name="nama_ayah" id="show_nama_ayah"
                    class="{{ $errors->show_anak->has('nama_ayah') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Ketik nama ayah" required value="{{ old('nama_ayah') }}"></x-text-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="tanggal_pendaftaran"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pendaftaran<span
                        class="text-red-500">*</span></label>
                <x-date-input name="tanggal_pendaftaran" id="show_tanggal_pendaftaran"
                    class="{{ $errors->edit_ibu->has('tanggal_pendaftaran') ? 'border-red-500' : 'border-gray-300' }}"
                    required value="{{ old('tanggal_pendaftaran') }}"></x-date-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    HP<span class="text-red-500">*</span></label>
                <x-number-input name="no_tlp" id="show_no_tlp"
                    class="{{ $errors->show_anak->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="08xxxxxxxxxx" required value="{{ old('no_tlp') }}"></x-number-input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelamin<span class="text-red-500">*</span></label>
                <select id="show_jenis_kelamin" name="jenis_kelamin"
                    class="{{ $errors->show_anak->has('jenis_kelamin') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option disabled selected>Pilih</option>
                    @foreach ($genders as $gender)
                        @if (old('jenis_kelamin') === $gender)
                            <option value="{{ $gender }}" selected>{{ $gender }}</option>
                        @else
                            <option value="{{ $gender }}">{{ $gender }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                        class="text-red-500">*</span></label>
                <x-text-input name="alamat" id="show_alamat"
                    class="{{ $errors->show_anak->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Ketik Alamat" required value="{{ old('alamat') }}"></x-text-input>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <x-danger-button x-on:click="$dispatch('close')">
                {{ __('Batal') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>
