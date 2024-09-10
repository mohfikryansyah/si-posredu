<!-- Modal Component -->
<x-modal name="add_pemeriksaan_remaja" id="add_pemeriksaan_remaja" :show="$errors->add_pemeriksaan_remaja->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Pemeriksaan remaja</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('pemeriksaanRemaja') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-3">
                <div class="col-span-2">
                    <label for="remaja_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="remaja_id" name="remaja_id"
                        class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($remajas as $remaja)
                            @if (old('remaja_id') === $remaja->id)
                                <option value="{{ $remaja->id }}" selected>{{ $remaja->nama }}</option>
                            @else
                                <option value="{{ $remaja->id }}">{{ $remaja->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('remaja_id', 'add_pemeriksaan_remaja')
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
                    @error('employee_id', 'add_pemeriksaan_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tanggal_pemeriksaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pemeriksaan<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="tanggal_pemeriksaan" id="tanggal_pemeriksaan"
                        class="{{ $errors->add_pemeriksaan_remaja->has('tanggal_pemeriksaan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('tanggal_pemeriksaan') }}"></x-date-input>
                    @error('tanggal_pemeriksaan', 'add_pemeriksaan_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="berat_badan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                        Badan<span class="text-red-500">*</span><span class="text-gray-400"> (kg)</span></label>
                    <x-number-input name="berat_badan" id="berat_badan"
                        class="{{ $errors->add_pemeriksaan_remaja->has('berat_badan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('berat_badan') }}"></x-number-input>
                    @error('berat_badan', 'add_pemeriksaan_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tinggi_badan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi Badan<span
                            class="text-red-500">*</span><span class="text-gray-400"> (cm)</span></label>
                    <x-number-input name="tinggi_badan" id="tinggi_badan"
                        class="{{ $errors->add_pemeriksaan_remaja->has('tinggi_badan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('tinggi_badan') }}"></x-number-input>
                    @error('tinggi_badan', 'add_pemeriksaan_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tekanan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah<span
                            class="text-red-500">*</span><span class="text-gray-400"> (mmHg)</span></label>
                    <x-text-input name="tekanan_darah" id="tekanan_darah"
                        class="{{ $errors->add_pemeriksaan_remaja->has('tekanan_darah') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('tekanan_darah') }}"></x-text-input>
                    @error('tekanan_darah', 'add_pemeriksaan_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="konseling_kesehatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konseling Kesehatan<span
                            class="text-red-500">*</span></label>
                    <x-text-input name="konseling_kesehatan" id="konseling_kesehatan"
                        class="{{ $errors->add_pemeriksaan_remaja->has('konseling_kesehatan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('konseling_kesehatan') }}"></x-text-input>
                    @error('konseling_kesehatan', 'add_pemeriksaan_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="pemberian_vitamin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemberian Vitamin<span
                            class="text-red-500">*</span></label>
                    <select id="pemberian_vitamin" name="pemberian_vitamin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        <option value="Ya" {{ old('pemberian_vitamin' == 'Ya' ? 'selected' : '') }}>Ya</option>
                        <option value="Tidak" {{ old('pemberian_vitamin' == 'Tidak' ? 'selected' : '') }}>Tidak
                        </option>
                    </select>
                    @error('pemberian_vitamin', 'add_pemeriksaan_remaja')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2 col-span-3">
                    <label for="catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan<span
                            class="text-red-500">*</span></label>
                    <x-text-input id="catatan" name="catatan"
                        class="{{ $errors->add_pemeriksaan_remaja->has('catatan') ? 'border-red-500' : 'border-gray-300' }}"
                        value="{{ old('catatan') }}"></x-text-input>
                    @error('catatan', 'add_pemeriksaan_remaja')
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
