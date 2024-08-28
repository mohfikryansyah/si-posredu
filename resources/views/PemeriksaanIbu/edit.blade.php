<!-- Modal Component -->
<x-modal name="edit_pemeriksaan_ibu" id="edit_pemeriksaan_ibu" :show="$errors->edit_pemeriksaan_ibu->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Uabh Data Pemeriksaan Ibu</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('pemeriksaanIbu') }}" method="POST" class="mt-4">
            @method("PUT")
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-3">
                <div class="col-span-2">
                    <input type="hidden" name="id" id="edit_id" value="{{ old('id') }}">
                    <label for="ibu_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="edit_ibu_id" name="ibu_id"
                        class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($moms as $mom)
                            @if (old('ibu_id') === $mom->id)
                                <option value="{{ $mom->id }}" selected>{{ $mom->nama }}</option>
                            @else
                                <option value="{{ $mom->id }}">{{ $mom->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('ibu_id', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label for="employee_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas<span
                            class="text-red-500">*</span></label>
                    <select id="edit_employee_id" name="employee_id"
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
                    @error('employee_id', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tanggal_pemeriksaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pemeriksaan<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="tanggal_pemeriksaan" id="edit_tanggal_pemeriksaan" class="{{ $errors->edit_pemeriksaan_ibu->has('tanggal_pemeriksaan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tanggal_pemeriksaan') }}"></x-date-input>
                    @error('tanggal_pemeriksaan', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="usia_kehamilan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia Kehamilan<span
                            class="text-red-500">*</span><span class="text-gray-400"> (Minggu)</span></label>
                    <x-number-input name="usia_kehamilan" id="edit_usia_kehamilan" class="{{ $errors->edit_pemeriksaan_ibu->has('usia_kehamilan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('usia_kehamilan') }}"></x-number-input>
                    @error('usia_kehamilan', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tekanan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah Sistolik<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="tekanan_darah" id="edit_tekanan_darah" class="{{ $errors->edit_pemeriksaan_ibu->has('tekanan_darah') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tekanan_darah') }}"></x-text-input>
                    @error('tekanan_darah', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="berat_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Badan<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="berat_badan" id="edit_berat_badan" class="{{ $errors->edit_pemeriksaan_ibu->has('berat_badan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('berat_badan') }}"></x-number-input>
                    @error('berat_badan', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tinggi_fundus"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi Fundus<span
                            class="text-red-500">*</span><span class="text-gray-400"> (cm)</span></label>
                    <x-number-input name="tinggi_fundus" id="edit_tinggi_fundus" class="{{ $errors->edit_pemeriksaan_ibu->has('tinggi_fundus') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tinggi_fundus') }}"></x-number-input>
                    @error('tinggi_fundus', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="denyut_jantung_janin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Denyut Jantung Janin<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="denyut_jantung_janin" id="edit_denyut_jantung_janin" class="{{ $errors->edit_pemeriksaan_ibu->has('denyut_jantung_janin') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('denyut_jantung_janin') }}"></x-number-input>
                    @error('denyut_jantung_janin', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2 col-span-3">
                    <label for="keluhan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="keluhan" id="edit_keluhan" class="{{ $errors->edit_pemeriksaan_ibu->has('keluhan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('keluhan') }}"></x-text-input>
                    @error('keluhan', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="pemberian_vitamin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemberian Vitamin<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="pemberian_vitamin" id="edit_pemberian_vitamin" class="{{ $errors->edit_pemeriksaan_ibu->has('pemberian_vitamin') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('pemberian_vitamin') }}"></x-text-input>
                    @error('pemberian_vitamin', 'edit_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-3">
                    <label for="catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan<span
                            class="text-red-500">*</span></label>
                    <x-text-input id="edit_catatan" name="catatan" class="{{ $errors->edit_pemeriksaan_ibu->has('catatan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('catatan') }}"></x-text-input>
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
