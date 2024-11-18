<x-app-layout>
    <div class="md:grid grid-cols-3 gap-5">
        <div class="col-span-2">
            <header class="w-full bg-white rounded-lg shadow">
                <div class="py-6 px-4">
                    <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                        {{ __('Daftar Petugas') }}
                    </h2>
                </div>
            </header>

            <div class="w-full relative overflow-x-auto rounded-lg shadow-md sm:rounded-lg bg-white my-5">
                <table id="table_petugasKesehatan">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Unit Kerja</th>
                            <th scope="col">No Tlp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugasKesehatan as $petugasKesehatan)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($petugasKesehatan->user)
                                        @if ($petugasKesehatan->user->fotoProfile)
                                            <img src="{{ asset('storage/' . $petugasKesehatan->user->fotoProfile) }}"
                                                class="w-10 h-10 rounded-full img-preview object-cover" alt="user foto">
                                        @else
                                            <div class="text-4xl">
                                                <i class="fa-solid fa-circle-user"></i>
                                            </div>
                                        @endif
                                    @else
                                        <div class="text-4xl">
                                            <i class="fa-solid fa-circle-user"></i>
                                        </div>
                                    @endif
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $petugasKesehatan->nama }}</div>
                                        @if ($petugasKesehatan->user !== null)
                                            <div class="font-normal text-gray-500">{{ $petugasKesehatan->user->email }}
                                            </div>
                                        @endif
                                    </div>
                                </th>
                                <td class="whitespace-nowrap">
                                    {{ $petugasKesehatan->nip }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $petugasKesehatan->jabatan }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $petugasKesehatan->unit_kerja }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $petugasKesehatan->no_tlp }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $petugasKesehatan->alamat }}
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <a href="{{ route('petugas-kesehatan.edit', ['petugas_kesehatan' => $petugasKesehatan->id]) }}"
                                            class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-green-500 bg-white hover:text-green-700 focus:outline-none transition">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a x-data data-id={{ $petugasKesehatan->id }}
                                            data-nama="{{ $petugasKesehatan->nama }}" href="javascript:void(0);"
                                            x-on:click="$dispatch('open-modal', 'delete_petugasKesehatan')"
                                            class="deletebtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-red-500 bg-white hover:text-red-700 focus:outline-none transition">
                                            <i class="fa-solid fa-trash-arrow-up"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <h1 class="bg-orange-400 px-5 py-2.5 text-gray-100 font-medium">Tambah Petugas</h1>
                <div class="p-5">
                    <form action="{{ route('petugas-kesehatan.update', ['petugas_kesehatan' => $e->id]) }}"
                        method="POST" class="max-w-sm mx-auto">
                        @method('PUT')
                        @csrf
                        <div class="mb-5">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                                    class="text-red-500">*</span></label>
                            <x-text-input name="nama" id="nama"
                                class="{{ $errors->add_petugasKesehatan->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                                value="{{ old('nama', $e->nama) }}"></x-text-input>
                            @error('nama', 'add_petugasKesehatan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="nip"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP<span
                                    class="text-red-500">*</span></label>
                            <x-number-input name="nip" id="nip"
                                class="{{ $errors->add_petugasKesehatan->has('nip') ? 'border-red-500' : 'border-gray-300' }}"
                                autocomplete="off" value="{{ old('nip', $e->nip) }}"></x-number-input>
                            @error('nip', 'add_petugasKesehatan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan<span
                                    class="text-red-500">*</span></label>
                            <select id="jabatan" name="jabatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled
                                    {{ old('jabatan', $e->jabatan ?? '') == '' ? 'selected' : '' }}>Pilih
                                    jabatan</option>
                                <option value="Dokter"
                                    {{ old('jabatan', $e->jabatan ?? '') == 'Dokter' ? 'selected' : '' }}>Dokter
                                </option>
                                <option value="Perawat"
                                    {{ old('jabatan', $e->jabatan ?? '') == 'Perawat' ? 'selected' : '' }}>
                                    Perawat
                                </option>
                                <option value="Bidan"
                                    {{ old('jabatan', $e->jabatan ?? '') == 'Bidan' ? 'selected' : '' }}>Bidan
                                </option>
                            </select>
                            @error('jabatan', 'add_petugasKesehatan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="unit_kerja"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit Kerja<span
                                    class="text-red-500">*</span></label>
                            <x-text-input name="unit_kerja" id="unit_kerja"
                                class="{{ $errors->add_petugasKesehatan->has('unit_kerja') ? 'border-red-500' : 'border-gray-300' }}"
                                autocomplete="off" value="{{ old('unit_kerja', $e->unit_kerja) }}"></x-text-input>
                            @error('unit_kerja', 'add_petugasKesehatan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="no_tlp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Tlp<span
                                    class="text-red-500">*</span></label>
                            <x-number-input name="no_tlp" id="no_tlp"
                                class="{{ $errors->add_petugasKesehatan->has('no_tlp') ? 'border-red-500' : 'border-gray-300' }}"
                                autocomplete="off" value="{{ old('no_tlp', $e->no_tlp) }}"></x-number-input>
                            @error('no_tlp', 'add_petugasKesehatan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                                    class="text-red-500">*</span></label>
                            <x-text-input name="alamat" id="alamat"
                                class="{{ $errors->add_petugasKesehatan->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                                autocomplete="off" value="{{ old('alamat', $e->alamat) }}"></x-text-input>
                            @error('alamat', 'add_petugasKesehatan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <x-save-button>Simpan</x-save-button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL --->
    @include('EmployeePetugas.delete')

    <x-slot:script>

        <script>
            new DataTable('#table_petugasKesehatan', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $('table').on('click', '.deletebtn', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('nama');

                    $('#delete_id').val(id);
                    $('#delete_nama').html(name);
                });
            });
        </script>
    </x-slot:script>

</x-app-layout>
