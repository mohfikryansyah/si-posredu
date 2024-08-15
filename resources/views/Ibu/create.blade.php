<!-- Modal Component -->
<x-modal name="add_ibu" :show="$errors->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Ibu</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('ibu') }}" method="POST" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ketik Nama Ibu" required value="{{ old('nama') }}">
                    @error('nama')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="tempat_tanggal_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                        Lahir<span class="text-red-500">*</span></label>
                    <input type="text" name="tempat_tanggal_lahir" id="tempat_tanggal_lahir"
                        class="bg-gray-50 border {{ $errors->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: Gorontalo, 11 April 2001" required
                        value="{{ old('tempat_tanggal_lahir') }}">
                    @error('tempat_tanggal_lahir')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="alamat" id="alamat"
                        class="bg-gray-50 border {{ $errors->has('alamat') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ketik Alamat" required value="{{ old('alamat') }}">
                    @error('alamat')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="pekerjaan" id="pekerjaan"
                        class="bg-gray-50 border {{ $errors->has('pekerjaan') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: Petani" required value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="golongan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gol. Darah<span
                            class="text-red-500">*</span></label>
                    <select id="golongan_darah" name="golongan_darah"
                        class="bg-gray-50 border {{ $errors->has('golongan_darah') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled selected>Pilih</option>
                        @foreach ($golongan_darah as $goldar)
                            @if (old('golongan_darah') === $goldar)
                                <option value="{{ $goldar }}" selected>{{ $goldar }}</option>
                            @else
                                <option value="{{ $goldar }}">{{ $goldar }}</option>
                            @endif
                        @endforeach
                        @error('golongan_darah')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        HP<span class="text-red-500">*</span></label>
                    <input type="text" name="no_tlp" id="no_tlp"
                        class="bg-gray-50 border {{ $errors->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: Petani" required value="{{ old('no_tlp') }}">
                    @error('no_tlp')
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
