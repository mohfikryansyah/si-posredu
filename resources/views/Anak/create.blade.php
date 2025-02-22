<!-- Modal Component -->
<x-modal name="add_anak" id="add_anak" :show="$errors->add_anak->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Anak</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('anak') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <div class="flex items-center justify-between">
                        <label for="nik"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK<span
                                class="text-red-500">*</span></label>
                        <button type="button"
                            class="block mb-2 text-sm font-medium text-blue-500 underline-offset-1 underline dark:text-white"
                            id="check-nik">Cek
                            NIK</button>
                    </div>
                    <x-number-input name="nik" id="nik"
                        class="{{ $errors->add_anak->has('nik') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('nik') }}"></x-number-input>
                    <p id="result" class="text-sm"></p>
                    @error('nik', 'add_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <x-text-input name="nama" id="nama"
                        class="{{ $errors->add_anak->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik nama anak" required value="{{ old('nama') }}" readonly></x-text-input>
                    @error('nama', 'add_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="tempat_tanggal_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                        Lahir<span class="text-red-500">*</span></label>
                    <x-text-input name="tempat_tanggal_lahir" id="tempat_tanggal_lahir"
                        class="{{ $errors->add_anak->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Contoh: Gorontalo, 11 April 2001" required
                        value="{{ old('tempat_tanggal_lahir') }}"></x-text-input>
                    @error('tempat_tanggal_lahir', 'add_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nama_ibu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Ibu<span class="text-red-500">*</span></label>
                    <x-text-input name="nama_ibu" id="nama_ibu"
                        class="{{ $errors->add_anak->has('nama_ibu') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik nama ibu" required value="{{ old('nama_ibu') }}"></x-text-input>
                    @error('nama_ibu', 'add_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="nama_ayah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Ayah<span class="text-red-500">*</span></label>
                    <x-text-input name="nama_ayah" id="nama_ayah"
                        class="{{ $errors->add_anak->has('nama_ayah') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik nama ayah" required value="{{ old('nama_ayah') }}"></x-text-input>
                    @error('nama_ayah', 'add_anak')
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
                    <label for="no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        HP<span class="text-red-500">*</span></label>
                    <x-number-input name="no_tlp" id="no_tlp"
                        class="{{ $errors->add_anak->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="08xxxxxxxxxx" required value="{{ old('no_tlp') }}"></x-number-input>
                    @error('no_tlp', 'add_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="jenis_kelamin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin<span
                            class="text-red-500">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="{{ $errors->add_anak->has('jenis_kelamin') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled selected>Pilih</option>
                        @foreach ($genders as $gender)
                            @if (old('jenis_kelamin') === $gender)
                                <option value="{{ $gender }}" selected>{{ $gender }}</option>
                            @else
                                <option value="{{ $gender }}">{{ $gender }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('jenis_kelamin', 'add_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="alamat" id="alamat"
                        class="{{ $errors->add_anak->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik Alamat" required value="{{ old('alamat') }}"></x-text-input>
                    @error('alamat', 'add_anak')
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
