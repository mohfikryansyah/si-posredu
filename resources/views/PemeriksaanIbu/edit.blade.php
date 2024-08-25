<!-- Modal Component -->
<x-modal name="edit_pemeriksaan_ibu" id="edit_pemeriksaan_ibu" :show="$errors->edit_pemeriksaan_ibu->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Ubah Data Pemeriksaan Ibu</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('pemeriksaanIbu') }}" method="POST" class="mt-4">
            @method('PUT')
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-3">
                <div class="col-span-2">
                    <input type="hidden" name="id" id="edit_id" value="{{ old('id') }}">
                    <label for="edit_ibu_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="edit_ibu_id" name="ibu_id"
                        class="select2nama bg-gray-50 border {{ $errors->has('ibu_id') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($moms as $mom)
                            @if (old('ibu_id', $mom->id) === $mom->id)
                                <option value="{{ $mom->id }}" selected>{{ $mom->nama }}</option>
                            @else
                                <option value="{{ $mom->id }}">{{ $mom->id }}</option>
                            @endif
                        @endforeach
                        @error('ibu_id', 'edit_pemeriksaan_ibu')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="edit_employee_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas<span
                            class="text-red-500">*</span></label>
                    <select id="edit_employee_id" name="employee_id"
                        class="select2employee bg-gray-50 border {{ $errors->has('employee_id') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($employees as $employee)
                            @if (old('employee_id', $employee->id) === $employee->id)
                                <option value="{{ $employee->id }}" selected>{{ $employee->name }}</option>
                            @else
                                <option value="{{ $employee->id }}">{{ $employee->id }}</option>
                            @endif
                        @endforeach
                        @error('employee_id', 'edit_pemeriksaan_ibu')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </select>
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="edit_tinggi_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi Badan<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="tinggi_badan" id="edit_tinggi_badan" class="{{ $errors->edit_pemeriksaan_ibu->has('tinggi_badan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('tinggi_badan', $mom->tinggi_badan) }}" />
                    @error('tinggi_badan', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="edit_berat_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Badan<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="berat_badan" id="edit_berat_badan" class="{{ $errors->edit_pemeriksaan_ibu->has('berat_badan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('berat_badan', $mom->berat_badan) }}" />
                    @error('berat_badan', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="edit_tekanan_darah_sistolik"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah Sistolik<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="tekanan_darah_sistolik" id="edit_tekanan_darah_sistolik" class="{{ $errors->edit_pemeriksaan_ibu->has('tekanan_darah_sistolik') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('tekanan_darah_sistolik', $mom->tekanan_darah_sistolik) }}" />
                    @error('tekanan_darah_sistolik', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="edit_tekanan_darah_diastolik"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah
                        Diastolik<span class="text-red-500">*</span></label>
                    <x-number-input name="tekanan_darah_diastolik" id="edit_tekanan_darah_diastolik" class="{{ $errors->edit_pemeriksaan_ibu->has('tekanan_darah_diastolik') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('tekanan_darah_diastolik', $mom->tekanan_darah_diastolik) }}" />
                    @error('tekanan_darah_diastolik', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="edit_kadar_gula_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kadar Gula Darah<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="kadar_gula_darah" id="edit_kadar_gula_darah" class="{{ $errors->edit_pemeriksaan_ibu->has('kadar_gula_darah') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('kadar_gula_darah', $mom->kadar_gula_darah) }}" />
                    @error('kadar_gula_darah', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="edit_kadar_asam_urat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kadar Asam Urat<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="kadar_asam_urat" id="edit_kadar_asam_urat" class="{{ $errors->edit_pemeriksaan_ibu->has('kadar_asam_urat') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('kadar_asam_urat', $mom->kadar_asam_urat) }}" />
                    @error('kadar_asam_urat', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="edit_kadar_kolestrol"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kadar Kolestrol<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="kadar_kolestrol" id="edit_kadar_kolestrol" class="{{ $errors->edit_pemeriksaan_ibu->has('kadar_kolestrol') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('kadar_kolestrol', $mom->kadar_kolestrol) }}" />
                    @error('kadar_kolestrol', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2 col-span-3">
                    <label for="edit_riwayat_penyakit"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat Penyakit<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="riwayat_penyakit" id="edit_riwayat_penyakit" class="{{ $errors->edit_pemeriksaan_ibu->has('riwayat_penyakit') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('riwayat_penyakit', $mom->riwayat_penyakit) }}"></x-text-input>
                    @error('riwayat_penyakit', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-3">
                    <label for="edit_catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="catatan" id="edit_catatan" class="{{ $errors->edit_pemeriksaan_ibu->has('catatan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('catatan', $mom->catatan) }}"></x-text-input>
                    @error('catatan', 'edit_pemeriksaan_ibu')
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
