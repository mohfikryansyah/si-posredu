<!-- Modal Component -->
<x-modal name="add_pemeriksaan_ibu" id="add_pemeriksaan_ibu" :show="$errors->add_pemeriksaan_ibu->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Pemeriksaan Ibu</h2>
        <p class="mt-2 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('pemeriksaanIbu') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-3">
                <div class="md:col-span-2 col-span-3">
                    <label for="ibu_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="ibu_id" name="ibu_id"
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
                    @error('ibu_id', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1  col-span-3">
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
                    <label for="tanggal_pemeriksaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pemeriksaan<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" class="{{ $errors->add_pemeriksaan_ibu->has('tanggal_pemeriksaan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tanggal_pemeriksaan') }}"></x-date-input>
                    @error('tanggal_pemeriksaan', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="usia_kehamilan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia Kehamilan<span
                            class="text-red-500">*</span><span class="text-gray-400"> (minggu)</span></label>
                    <x-number-input name="usia_kehamilan" id="usia_kehamilan" class="{{ $errors->add_pemeriksaan_ibu->has('usia_kehamilan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('usia_kehamilan') }}"></x-number-input>
                    @error('usia_kehamilan', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tekanan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah<span
                            class="text-red-500">*</span><span class="text-gray-400"> (mmHg)</span></label>
                    <x-text-input name="tekanan_darah" id="tekanan_darah" class="{{ $errors->add_pemeriksaan_ibu->has('tekanan_darah') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tekanan_darah') }}" autocomplete="off"></x-text-input>
                    @error('tekanan_darah', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="berat_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Badan<span
                            class="text-red-500">*</span><span class="text-gray-400"> (kg)</span></label>
                    <x-number-input name="berat_badan" id="berat_badan" class="{{ $errors->add_pemeriksaan_ibu->has('berat_badan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('berat_badan') }}"></x-number-input>
                    @error('berat_badan', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tinggi_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi Badan<span
                            class="text-red-500">*</span><span class="text-gray-400"> (cm)</span></label>
                    <x-number-input name="tinggi_badan" id="tinggi_badan" class="{{ $errors->add_pemeriksaan_ibu->has('tinggi_badan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tinggi_badan') }}" autocomplete="off"></x-number-input>
                    @error('tinggi_badan', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="lingkar_lengan_atas"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lingkar Lengan Atas<span
                            class="text-red-500">*</span><span class="text-gray-400"> (cm)</span></label>
                    <x-number-input name="lingkar_lengan_atas" id="lingkar_lengan_atas" class="{{ $errors->add_pemeriksaan_ibu->has('lingkar_lengan_atas') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('lingkar_lengan_atas') }}"></x-number-input>
                    @error('lingkar_lengan_atas', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="pemeriksaan_lab"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemeriksaan Lab<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="pemeriksaan_lab" id="pemeriksaan_lab" class="{{ $errors->add_pemeriksaan_ibu->has('pemeriksaan_lab') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('pemeriksaan_lab') }}"></x-text-input>
                    @error('pemeriksaan_lab', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-3 md:col-span-1">
                    <label for="suntik_tetanus_toksoid"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suntik Tetanus Toksoid<span
                            class="text-red-500">*</span></label>
                    <select id="suntik_tetanus_toksoid" name="suntik_tetanus_toksoid"
                        class="bg-gray-50 {{ $errors->add_ibu->has('suntik_tetanus_toksoid') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled selected>Pilih</option>
                        @foreach ($suntik_tetanus_toksoid as $suntik)
                            @if (old('suntik_tetanus_toksoid') === $suntik)
                                <option value="{{ $suntik }}" selected>{{ $suntik }}</option>
                            @else
                                <option value="{{ $suntik }}">{{ $suntik }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('suntik_tetanus_toksoid', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tinggi_fundus"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi Fundus<span
                            class="text-red-500">*</span><span class="text-gray-400"> (cm)</span></label>
                    <x-number-input name="tinggi_fundus" id="tinggi_fundus" class="{{ $errors->add_pemeriksaan_ibu->has('tinggi_fundus') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tinggi_fundus') }}"></x-number-input>
                    @error('tinggi_fundus', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="denyut_jantung_janin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Denyut Jantung Janin<span
                            class="text-red-500">*</span><span class="text-gray-400">(bpm)</span></label>
                    <x-number-input name="denyut_jantung_janin" id="denyut_jantung_janin" class="{{ $errors->add_pemeriksaan_ibu->has('denyut_jantung_janin') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('denyut_jantung_janin') }}"></x-number-input>
                    @error('denyut_jantung_janin', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="keluhan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="keluhan" id="keluhan" class="{{ $errors->add_pemeriksaan_ibu->has('keluhan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('keluhan') }}"></x-text-input>
                    @error('keluhan', 'add_pemeriksaan_ibu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="pemberian_vitamin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemberian Vitamin<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="pemberian_vitamin" id="pemberian_vitamin" class="{{ $errors->add_pemeriksaan_ibu->has('pemberian_vitamin') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('pemberian_vitamin') }}"></x-text-input>
                    @error('pemberian_vitamin', 'add_pemeriksaan_ibu')
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
