<!-- Modal Component -->
<x-modal name="edit_ibu" id="edit_ibu" :show="$errors->edit_ibu->any()" maxWidth="2xl">
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Ubah Data Ibu</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('ibu') }}" method="POST" class="mt-4">
            @method("PUT")
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="nik" id="nik"
                        class="{{ $errors->edit_ibu->has('nik') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('nik') }}"></x-number-input>
                    @error('nik', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <input type="hidden" name="id" id="edit_id" value="{{ old('id') }}">
                    <label for="edit_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <x-text-input name="nama" id="edit_nama"
                        class="{{ $errors->edit_ibu->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik Nama Ibu" required value="{{ old('nama') }}"></x-text-input>
                    @error('nama', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_nama_suami" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Suami<span class="text-red-500">*</span></label>
                    <x-text-input name="nama_suami" id="edit_nama_suami"
                        class="{{ $errors->edit_ibu->has('nama_suami') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Ketik Nama Suami" required value="{{ old('nama_suami') }}"></x-text-input>
                    @error('nama_suami', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_tempat_tanggal_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                        Lahir<span class="text-red-500">*</span></label>
                    <x-text-input name="tempat_tanggal_lahir" id="edit_tempat_tanggal_lahir"
                        class="{{ $errors->edit_ibu->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Contoh: Gorontalo, 11 April 2001" required value="{{ old('tempat_tanggal_lahir') }}"></x-text-input>
                    @error('tempat_tanggal_lahir', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="alamat" id="edit_alamat"
                        class="{{ $errors->edit_ibu->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('alamat') }}"></x-text-input>
                    @error('alamat', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_tanggal_pendaftaran"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pendaftaran<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="tanggal_pendaftaran" id="edit_tanggal_pendaftaran"
                        class="{{ $errors->edit_ibu->has('tanggal_pendaftaran') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('tanggal_pendaftaran') }}"></x-date-input>
                    @error('tanggal_pendaftaran', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="pekerjaan" id="edit_pekerjaan"
                        class="{{ $errors->edit_ibu->has('pekerjaan') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('pekerjaan') }}"></x-text-input>
                    @error('pekerjaan', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_golongan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gol. Darah<span
                            class="text-red-500">*</span></label>
                    <select id="edit_golongan_darah" name="golongan_darah"
                        class="{{ $errors->edit_ibu->has('golongan_darah') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled selected>Pilih</option>
                        @foreach ($golongan_darah as $goldar)
                            @if (old('golongan_darah') === $goldar)
                                <option value="{{ $goldar }}" selected>{{ $goldar }}</option>
                            @else
                                <option value="{{ $goldar }}">{{ $goldar }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('golongan_darah', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        HP<span class="text-red-500">*</span></label>
                    <x-number-input name="no_tlp" id="edit_no_tlp"
                        class="{{ $errors->edit_ibu->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('no_tlp') }}"></x-number-input>
                    @error('no_tlp', 'edit_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="edit_nomor_kehamilan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kehamilan Ke<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="nomor_kehamilan" id="edit_nomor_kehamilan"
                        class="{{ $errors->edit_ibu->has('nomor_kehamilan') ? 'border-red-500' : 'border-gray-300' }}"
                        required value="{{ old('nomor_kehamilan') }}"></x-number-input>
                    @error('nomor_kehamilan', 'edit_ibu')
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
            </div>
        </form>

    </div>
</x-modal>


