<!-- Modal Component -->
<x-modal name="edit_ibu" id="edit_ibu" :show="false" maxWidth="2xl">
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Buat Data Ibu</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('ibu.update', ['ibu' => $mom->uuid]) }}" method="POST" class="mt-4">
            @method("PUT")
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <label for="edit_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama<span class="text-red-500">*</span></label>
                    <input type="text" name="nama" id="edit_nama"
                        class="bg-gray-50 border {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ketik Nama Ibu" required>
                    @error('nama')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="tempat_tanggal_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                        Lahir<span class="text-red-500">*</span></label>
                    <input type="text" name="tempat_tanggal_lahir" id="edit_tempat_tanggal_lahir"
                        class="bg-gray-50 border {{ $errors->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: Gorontalo, 11 April 2001" required>
                    @error('tempat_tanggal_lahir')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="alamat" id="edit_alamat"
                        class="bg-gray-50 border {{ $errors->has('alamat') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ketik Alamat" required>
                    @error('alamat')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="pekerjaan" id="edit_pekerjaan"
                        class="bg-gray-50 border {{ $errors->has('pekerjaan') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: Petani" required>
                    @error('pekerjaan')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="golongan_darah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gol. Darah<span
                            class="text-red-500">*</span></label>
                    <select id="edit_golongan_darah" name="golongan_darah"
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
                    <input type="text" name="no_tlp" id="edit_no_tlp"
                        class="bg-gray-50 border {{ $errors->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Contoh: Petani" required>
                    @error('no_tlp')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between">
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                    Simpan
                </button>

                <div class="">
                    <button type="button" x-on:click="$dispatch('close-modal', 'edit_ibu')"
                        class="bg-red-600 text-white px-4 py-2 rounded">
                        Batal
                    </button>
                </div>
            </div>
        </form>

    </div>
</x-modal>

<x-slot:script>
    <script>
        $(document).ready(function() {
            $('table').on('click', '.editbtn', function() {
                var name = $(this).data('nama');
                var ttl = $(this).data('tempat-tanggal-lahir');
                var alamat = $(this).data('alamat');
                var pekerjaan = $(this).data('pekerjaan');
                var golongan_darah = $(this).data('golongan-darah');
                var no_tlp = $(this).data('no-tlp');
                

                $('#edit_nama').val(name);
                $('#edit_tempat_tanggal_lahir').val(ttl);
                $('#edit_alamat').val(alamat);
                $('#edit_pekerjaan').val(pekerjaan);
                $('#edit_golongan_darah').val(golongan_darah);
                $('#edit_no_tlp').val(no_tlp);
            });
        });
    </script>
</x-slot:script>
