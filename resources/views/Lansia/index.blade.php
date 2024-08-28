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
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_lansia')"
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
                    <th scope="col">Lahir</th>
                    <th scope="col">Gol. Darah</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Tlp</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lansias as $lansia)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            {{ $lansia->nama }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $lansia->tempat_tanggal_lahir }}
                        </td>
                        <td class="text-center">
                            {{ $lansia->golongan_darah }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $lansia->alamat }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $lansia->no_tlp }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $lansia->pekerjaan }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data 
                                    data-id="{{ $lansia->id }}"
                                    data-nama="{{ $lansia->nama }}" 
                                    data-tempat-tanggal-lahir="{{ $lansia->tempat_tanggal_lahir }}"
                                    data-alamat="{{ $lansia->alamat }}" 
                                    data-pekerjaan="{{ $lansia->pekerjaan }}"
                                    data-golongan-darah="{{ $lansia->golongan_darah }}"
                                    data-no-tlp="{{ $lansia->no_tlp }}"
                                    x-on:click="$dispatch('open-modal', 'edit_lansia')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $lansia->id }} data-nama="{{ $lansia->nama }}"
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
    @include('Lansia.create')
    @include('Lansia.edit')
    @include('Lansia.delete')

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
