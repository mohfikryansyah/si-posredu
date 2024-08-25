<!-- Modal Component -->
<x-modal name="add_pemeriksaan_ibu" id="add_pemeriksaan_ibu" :show="$errors->add_pemeriksaan_ibu->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Pemeriksaan Ibu</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('pemeriksaanIbu') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-3">
                <div class="col-span-2">
                    <label for="ibu_hamil_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="ibu_hamil_id" name="ibu_hamil_id"
                        class="select2nama"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($moms as $mom)
                            @if (old('ibu_hamil_id') === $mom->id)
                                <option value="{{ $mom->id }}" selected>{{ $mom->nama }}</option>
                            @else
                                <option value="{{ $mom->id }}">{{ $mom->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('ibu_hamil_id', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="employee_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas<span
                            class="text-red-500">*</span></label>
                    <select id="employee_id" name="employee_id"
                        class="select2employee"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($employees as $employee)
                            @if (old('employee_id') === $employee->id)
                                <option value="{{ $employee->id }}" selected>{{ $employee->name }}</option>
                            @else
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('employee_id', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tinggi_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi Badan<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="tinggi_badan" id="tinggi_badan" class="{{ $errors->add_pemeriksaan_ibu->has('tinggi_badan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tinggi_badan') }}"></x-number-input>
                    @error('tinggi_badan', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="berat_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Badan<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="berat_badan" id="berat_badan" class="{{ $errors->add_pemeriksaan_ibu->has('berat_badan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('berat_badan') }}"></x-number-input>
                    @error('berat_badan', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tekanan_darah_sistolik"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah Sistolik<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="tekanan_darah_sistolik" id="tekanan_darah_sistolik" class="{{ $errors->add_pemeriksaan_ibu->has('tekanan_darah_sistolik') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tekanan_darah_sistolik') }}"></x-number-input>
                    @error('tekanan_darah_sistolik', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tekanan_darah_diastolik"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah Diastolik<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="tekanan_darah_diastolik" id="tekanan_darah_diastolik" class="{{ $errors->add_pemeriksaan_ibu->has('tekanan_darah_diastolik') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tekanan_darah_diastolik') }}"></x-number-input>
                    @error('tekanan_darah_diastolik', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="kadar_gula_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kadar Gula Darah<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="kadar_gula_darah" id="kadar_gula_darah" class="{{ $errors->add_pemeriksaan_ibu->has('kadar_gula_darah') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('kadar_gula_darah') }}"></x-number-input>
                    @error('kadar_gula_darah', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="kadar_asam_urat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kadar Asam Urat<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="kadar_asam_urat" id="kadar_asam_urat" class="{{ $errors->add_pemeriksaan_ibu->has('kadar_asam_urat') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('kadar_asam_urat') }}"></x-number-input>
                    @error('kadar_asam_urat', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="kadar_kolestrol"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kadar Kolestrol<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="kadar_kolestrol" id="kadar_kolestrol" class="{{ $errors->add_pemeriksaan_ibu->has('kadar_kolestrol') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('kadar_kolestrol') }}"></x-number-input>
                    @error('kadar_kolestrol', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2 col-span-3">
                    <label for="riwayat_penyakit"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat Penyakit<span
                            class="text-red-500">*</span></label>
                    <x-text-input id="riwayat_penyakit" name="riwayat_penyakit" class="{{ $errors->add_pemeriksaan_ibu->has('riwayat_penyakit') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('riwayat_penyakit') }}"></x-text-input>
                    @error('riwayat_penyakit', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-3">
                    <label for="catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan<span
                            class="text-red-500">*</span></label>
                    <x-text-input id="catatan" name="catatan" class="{{ $errors->add_pemeriksaan_ibu->has('catatan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('catatan') }}"></x-text-input>
                    @error('catatan', 'add_pemeriksaan_ibu')
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
