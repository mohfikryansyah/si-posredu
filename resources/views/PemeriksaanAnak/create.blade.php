<!-- Modal Component -->
<x-modal name="add_pemeriksaan_anak" id="add_pemeriksaan_anak" :show="$errors->add_pemeriksaan_anak->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Pemeriksaan Anak</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('pemeriksaanAnak') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-3">
                <div class="col-span-2">
                    <label for="anak_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="anak_id" name="anak_id"
                        class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($children as $child)
                            @if (old('anak_id') === $child->id)
                                <option value="{{ $child->id }}" selected>{{ $child->nama }}</option>
                            @else
                                <option value="{{ $child->id }}">{{ $child->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('anak_id', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="employee_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas<span
                            class="text-red-500">*</span></label>
                    <select id="employee_id" name="employee_id"
                        class="select2employee bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($employees as $employee)
                            @if (old('employee_id') === $employee->id)
                                <option value="{{ $employee->id }}" selected>{{ $employee->nama }}</option>
                            @else
                                <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('employee_id', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tanggal_pemeriksaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pemeriksaan<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" class="{{ $errors->add_pemeriksaan_anak->has('tanggal_pemeriksaan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tanggal_pemeriksaan') }}"></x-date-input>
                    @error('tanggal_pemeriksaan', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="berat_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Badan<span
                            class="text-red-500">*</span><span class="text-gray-400"> (kg)</span></label>
                    <x-number-input name="berat_badan" id="berat_badan" class="{{ $errors->add_pemeriksaan_anak->has('berat_badan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('berat_badan') }}"></x-number-input>
                    @error('berat_badan', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tinggi_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi Badan<span
                            class="text-red-500">*</span><span class="text-gray-400"> (cm)</span></label>
                    <x-number-input name="tinggi_badan" id="tinggi_badan" class="{{ $errors->add_pemeriksaan_anak->has('tinggi_badan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tinggi_badan') }}"></x-number-input>
                    @error('tinggi_badan', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tekanan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah<span
                            class="text-red-500">*</span><span class="text-gray-400"> (mmHg)</span></label>
                    <x-text-input name="tekanan_darah" id="tekanan_darah" class="{{ $errors->add_pemeriksaan_anak->has('tekanan_darah') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tekanan_darah') }}"></x-text-input>
                    @error('tekanan_darah', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="suhu_tubuh"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suhu Tubuh<span
                            class="text-red-500">*</span><span class="text-gray-400"> (derajat)</span></label>
                    <x-number-input name="suhu_tubuh" id="suhu_tubuh" class="{{ $errors->add_pemeriksaan_anak->has('suhu_tubuh') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('suhu_tubuh') }}"></x-number-input>
                    @error('suhu_tubuh', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="status_imunisasi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Imunisasi<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="status_imunisasi" id="status_imunisasi" class="{{ $errors->add_pemeriksaan_anak->has('status_imunisasi') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('status_imunisasi') }}"></x-text-input>
                    @error('status_imunisasi', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="riwayat_penyakit"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat Penyakit<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="riwayat_penyakit" id="riwayat_penyakit" class="{{ $errors->add_pemeriksaan_anak->has('riwayat_penyakit') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('riwayat_penyakit') }}"></x-text-input>
                    @error('riwayat_penyakit', 'add_pemeriksaan_anak')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2 col-span-3">
                    <label for="catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan<span
                            class="text-red-500">*</span></label>
                    <x-text-input id="catatan" name="catatan" class="{{ $errors->add_pemeriksaan_anak->has('catatan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('catatan') }}"></x-text-input>
                    @error('catatan', 'add_pemeriksaan_anak')
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
