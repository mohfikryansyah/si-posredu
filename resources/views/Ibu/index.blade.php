<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Ibu') }}
        </h2>
    </x-slot>

    <div class="w-full h-auto rounded-lg py-5">
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
            <!-- Button to open modal -->
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_ibu')"
                class="bg-orange-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
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
        <table id="table_ibu">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat, tanggal lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Tlp</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Gol. Darah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moms as $mom)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap px-6 py-4">
                            {{ $mom->nama }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->tempat_tanggal_lahir }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->alamat }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->no_tlp }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->pekerjaan }}
                        </td>
                        <td class="text-center">
                            {{ $mom->golongan_darah }}
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
                                        data-tempat-tanggal-lahir="{{ $mom->tempat_tanggal_lahir }}"
                                        data-alamat="{{ $mom->alamat }}" data-pekerjaan="{{ $mom->pekerjaan }}"
                                        data-golongan-darah="{{ $mom->golongan_darah }}"
                                        data-no-tlp="{{ $mom->no_tlp }}" href="javascript:void(0);" x-data
                                        x-on:click="$dispatch('open-modal', 'edit_ibu')"
                                        class="editbtn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                    <a data-id={{ $mom->id }} data-nama="{{ $mom->nama }}"
                                        href="javascript:void(0);" x-data
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
    @include('Ibu.create')
    @include('Ibu.edit')
    @include('Ibu.delete')

    <x-slot:script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_ibu');
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
                    // $('#edit_nama').html(name);
                    $('#edit_tempat_tanggal_lahir').val(ttl);
                    $('#edit_alamat').val(alamat);
                    $('#edit_pekerjaan').val(pekerjaan);
                    $('#edit_golongan_darah').val(golongan_darah);
                    $('#edit_no_tlp').val(no_tlp);
                });
            });

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
