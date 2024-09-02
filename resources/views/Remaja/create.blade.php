<!-- Modal Component -->
<x-modal name="add_remaja" id="add_remaja" :show="$errors->add_remaja->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Remaja</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('remaja') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <x-text-input name="nama" id="nama"
                        class="{{ $errors->add_remaja->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik nama lengkap" required value="{{ old('nama') }}"></x-text-input>
                    @error('nama', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="tanggal_pendaftaran"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pendaftaran<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="tanggal_pendaftaran" id="tanggal_pendaftaran"
                        class="{{ $errors->edit_ibu->has('tanggal_pendaftaran') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('tanggal_pendaftaran') }}"></x-date-input>
                    @error('tanggal_pendaftaran', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="nik" id="nik"
                        class="{{ $errors->add_remaja->has('nik') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('nik') }}"></x-number-input>
                    @error('nik', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="tempat_tanggal_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                        Lahir<span class="text-red-500">*</span></label>
                    <x-text-input name="tempat_tanggal_lahir" id="tempat_tanggal_lahir"
                        class="{{ $errors->add_remaja->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Contoh: Gorontalo, 11 April 2001" required
                        value="{{ old('tempat_tanggal_lahir') }}"></x-text-input>
                    @error('tempat_tanggal_lahir', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="golongan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gol. Darah<span
                            class="text-red-500">*</span></label>
                    <select id="golongan_darah" name="golongan_darah"
                        class="{{ $errors->add_ibu->has('golongan_darah') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled selected>Pilih</option>
                        @foreach ($golongan_darah as $goldar)
                            @if (old('golongan_darah') === $goldar)
                                <option value="{{ $goldar }}" selected>{{ $goldar }}</option>
                            @else
                                <option value="{{ $goldar }}">{{ $goldar }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('golongan_darah', 'add_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="jenis_kelamin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin<span
                            class="text-red-500">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="{{ $errors->add_remaja->has('jenis_kelamin') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled selected>Pilih</option>
                        @foreach ($genders as $gender)
                            @if (old('jenis_kelamin') === $gender)
                                <option value="{{ $gender }}" selected>{{ $gender }}</option>
                            @else
                                <option value="{{ $gender }}">{{ $gender }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('jenis_kelamin', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="usia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia<span
                            class="text-red-500">*</span><span class="text-gray-400"> (tahun)</span></label>
                    <x-number-input name="usia" id="usia"
                        class="{{ $errors->add_remaja->has('usia') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('usia') }}"></x-number-input>
                    @error('usia', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        HP<span class="text-red-500">*</span></label>
                    <x-number-input name="no_tlp" id="no_tlp"
                        class="{{ $errors->add_remaja->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="08xxxxxxxxxx" required value="{{ old('no_tlp') }}"></x-number-input>
                    @error('no_tlp', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nama_orang_tua" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Orang Tua<span class="text-red-500">*</span></label>
                    <x-text-input name="nama_orang_tua" id="nama_orang_tua"
                        class="{{ $errors->add_remaja->has('nama_orang_tua') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('nama_orang_tua') }}"></x-text-input>
                    @error('nama_orang_tua', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="pekerjaan_orang_tua"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pekerjaan Orang Tua<span class="text-red-500">*</span></label>
                    <x-text-input name="pekerjaan_orang_tua" id="pekerjaan_orang_tua"
                        class="{{ $errors->add_remaja->has('pekerjaan_orang_tua') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('pekerjaan_orang_tua') }}"></x-text-input>
                    @error('pekerjaan_orang_tua', 'add_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="alamat" id="alamat"
                        class="{{ $errors->add_remaja->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('alamat') }}"></x-text-input>
                    @error('alamat', 'add_remaja')
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