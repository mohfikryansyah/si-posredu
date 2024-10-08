<!-- Modal Component -->
<x-modal name="add_pemeriksaan_lansia" id="add_pemeriksaan_lansia" :show="$errors->add_pemeriksaan_lansia->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Pemeriksaan Lansia</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('pemeriksaanLansia') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-3">
                <div class="col-span-3 md:col-span-2">
                    <label for="lansia_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="lansia_id" name="lansia_id"
                        class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option disabled selected>Pilih</option>
                        @foreach ($lansias as $lansia)
                            @if (old('lansia_id') === $lansia->id)
                                <option value="{{ $lansia->id }}" selected>{{ $lansia->nama }}</option>
                            @else
                                <option value="{{ $lansia->id }}">{{ $lansia->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('lansia_id', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
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
                    @error('employee_id', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tanggal_pemeriksaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pemeriksaan<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" class="{{ $errors->add_pemeriksaan_lansia->has('tanggal_pemeriksaan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tanggal_pemeriksaan') }}"></x-date-input>
                    @error('tanggal_pemeriksaan', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="tekanan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah<span
                            class="text-red-500">*</span><span class="text-gray-400"> (mmHg)</span></label>
                    <x-text-input name="tekanan_darah" id="tekanan_darah" class="{{ $errors->add_pemeriksaan_lansia->has('tekanan_darah') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('tekanan_darah') }}"></x-text-input>
                    @error('tekanan_darah', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="md:col-span-1 col-span-3">
                    <label for="suhu_tubuh"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suhu Tubuh<span
                            class="text-red-500">*</span><span class="text-gray-400"> (derajat)</span></label>
                    <x-number-input name="suhu_tubuh" id="suhu_tubuh" class="{{ $errors->add_pemeriksaan_lansia->has('suhu_tubuh') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('suhu_tubuh') }}"></x-number-input>
                    @error('suhu_tubuh', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div class="md:col-span-1 col-span-3">
                    <label for="kolestrol"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolestrol<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="kolestrol" id="kolestrol" class="{{ $errors->add_pemeriksaan_lansia->has('kolestrol') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('kolestrol') }}"></x-number-input>
                    @error('kolestrol', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="asam_urat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asam Urat<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="asam_urat" id="asam_urat" class="{{ $errors->add_pemeriksaan_lansia->has('asam_urat') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('asam_urat') }}"></x-number-input>
                    @error('asam_urat', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-3">
                    <label for="gula_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gula Darah<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="gula_darah" id="gula_darah" class="{{ $errors->add_pemeriksaan_lansia->has('gula_darah') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('gula_darah') }}"></x-number-input>
                    @error('gula_darah', 'add_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-2 col-span-3">
                    <label for="catatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan<span
                            class="text-red-500">*</span></label>
                    <x-text-input id="catatan" name="catatan" class="{{ $errors->add_pemeriksaan_lansia->has('catatan') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('catatan') }}"></x-text-input>
                    @error('catatan', 'add_pemeriksaan_lansia')
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
