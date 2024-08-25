<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Ibu Hamil') }}
        </h2>
    </x-slot>

    <div class="w-full h-auto rounded-lg py-5">
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
            <!-- Button to open modal -->
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_ibuHamil')"
                class="openbtn bg-orange-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
                <svg class="me-1 -ms-1 w-5 h-5 font-bold" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Tambah Data
            </button>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table id="table_ibu_hamil">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Usia Kehamilan</th>
                    <th scope="col">Kehamilan Ke</th>
                    <th scope="col">Tanggal Persalinan</th>
                    <th scope="col">Penolong Persalinan</th>
                    <th scope="col">Kondisi Bayi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moms as $mom)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            {{ $mom->nama }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->usia_kehamilan }} Bulan
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->nomor_kehamilan }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->tanggal_persalinan }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->penolong_persalinan }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->kondisi_bayi }}
                        </td>
                        <td>
                            <x-dropdown2 align="right" width="w-32">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Dropdown content here -->
                                    <a data-id="{{ $mom->id }}" data-nama="{{ $mom->nama }}"
                                        data-usia-kehamilan="{{ $mom->usia_kehamilan }}"
                                        data-nomor-kehamilan="{{ $mom->nomor_kehamilan }}"
                                        data-tanggal-persalinan="{{ $mom->tanggal_persalinan }}" data-penolong-persalinan="{{ $mom->penolong_persalinan }}"
                                        data-kondisi-bayi="{{ $mom->kondisi_bayi }}"
                                        href="javascript:void(0);"
                                        x-data="" x-on:click="$dispatch('open-modal', 'edit_ibu_hamil')"
                                        class="editbtn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                    <a data-id={{ $mom->id }} data-nama="{{ $mom->nama }}"
                                        href="javascript:void(0);" x-data=""
                                        x-on:click="$dispatch('open-modal', 'delete_ibu')"
                                        class="deletebtn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hapus</a>
                                </x-slot>
                            </x-dropdown2>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL --->
    @include('IbuHamil.create')
    @include('IbuHamil.edit')
    @include('IbuHamil.delete')

    <x-slot:script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_ibu_hamil', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $('table').on('click', '.editbtn', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('nama');
                    var usia_kehamilan = $(this).data('usia-kehamilan');
                    var nomor_kehamilan = $(this).data('nomor-kehamilan');
                    var tanggal_persalinan = $(this).data('tanggal-persalinan');
                    var penolong_persalinan = $(this).data('penolong-persalinan');
                    var kondisi_bayi = $(this).data('kondisi-bayi');

                    $('#edit_id').val(id);
                    $('#edit_nama').val(name);
                    $('#edit_usia_kehamilan').val(usia_kehamilan);
                    $('#edit_nomor_kehamilan').val(nomor_kehamilan);
                    $('#edit_tanggal_persalinan').val(tanggal_persalinan);
                    $('#edit_penolong_persalinan').val(penolong_persalinan);
                    $('#edit_kondisi_bayi').val(kondisi_bayi);
                });

                $('table').on('click', '.deletebtn', function() {
                    var id = $(this).data('id');

                    $('#delete_id').val(id);
                });
            });
        </script>
    </x-slot:script>

</x-app-layout>
