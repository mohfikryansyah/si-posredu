<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Lansia') }}
        </h2>
    </x-slot>

    <div class="w-full h-auto rounded-lg py-5">
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
            <!-- Button to open modal -->
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_pemeriksaan_lansia')"
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
        <table id="table_lansia">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tgl. Periksa</th>
                    <th scope="col">Tekanan Darah</th>
                    <th scope="col">Kolestrol</th>
                    <th scope="col">Asam Urat</th>
                    <th scope="col">Gula Darah</th>
                    <th scope="col">Suhu Tubuh</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Petugas Pemeriksa</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemeriksaans as $pemeriksaan)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            {{ $pemeriksaan->lansia->nama }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->tanggal_pemeriksaan }}
                        </td>
                        <td class="text-center">
                            {{ $pemeriksaan->tekanan_darah }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->kolestrol }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->asam_urat }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->gula_darah }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->suhu_tubuh }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->catatan }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->employee->name }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data 
                                    data-id="{{ $pemeriksaan->id }}"
                                    data-nama="{{ $pemeriksaan->lansia->nama }}" 
                                    data-tanggal-pemeriksaan="{{ $pemeriksaan->tanggal_pemeriksaan }}"
                                    data-tekanan_darah="{{ $pemeriksaan->tekanan_darah }}" 
                                    data-kolestrol="{{ $pemeriksaan->kolestrol }}"
                                    data-asam-urat="{{ $pemeriksaan->asam_urat }}"
                                    data-gula-darah="{{ $pemeriksaan->gula_darah }}"
                                    data-suhu-tubuh="{{ $pemeriksaan->suhu_tubuh }}"
                                    data-catatan="{{ $pemeriksaan->catatan }}"
                                    data-employee-id="{{ $pemeriksaan->employee->id }}"
                                    x-on:click="$dispatch('open-modal', 'edit_lansia')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $pemeriksaan->id }} data-nama="{{ $pemeriksaan->nama }}"
                                    href="javascript:void(0);" x-data=""
                                    x-on:click="$dispatch('open-modal', 'delete_lansia')"
                                    class="deletebtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                    <i class="fa-solid fa-trash-arrow-up"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL --->
    {{-- @include('Lansia.create')
    @include('Lansia.edit')
    @include('Lansia.delete') --}}

    <x-slot:script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_lansia', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $('table').on('click', '.editbtn', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('nama');
                    var ttl = $(this).data('tempat-tanggal-lahir');
                    var alamat = $(this).data('alamat');
                    var pekerjaan = $(this).data('pekerjaan');
                    var golongan_darah = $(this).data('golongan-darah');
                    var no_tlp = $(this).data('no-tlp');

                    $('#edit_id').val(id);
                    $('#edit_nama').val(name);
                    $('#edit_tempat_tanggal_lahir').val(ttl);
                    $('#edit_alamat').val(alamat);
                    $('#edit_pekerjaan').val(pekerjaan);
                    $('#edit_golongan_darah').val(golongan_darah);
                    $('#edit_no_tlp').val(no_tlp);
                });

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
