<x-app-layout>

    <div class="bg-white py-6 px-4 md:max-w-2xl w-full rounded-lg shadow">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data NIK Penduduk Desa') }}
        </h2>
    </div>

    <div class="flex space-x-2">
        <div class="h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_nik')"
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
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-2xl bg-white">
        <table id="table_nik">
            <thead>
                <tr>
                    <th scope="col" class="w-20">No.</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niks as $nik)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 group">
                        <th class="whitespace-nowrap text-center">
                            {{ $loop->iteration }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $nik->nik }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal truncate" title="{{ $nik->nama }}">
                            {{ $nik->nama }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data data-id="{{ $nik->id }}" data-nama="{{ $nik->nama }}"
                                    data-nik="{{ $nik->nik }}" x-on:click="$dispatch('open-modal', 'edit_nik')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-green-500 focus:outline-none transition group-hover:bg-gray-50">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $nik->id }} data-nik="{{ $nik->nik }}" href="javascript:void(0);"
                                    x-data="" x-on:click="$dispatch('open-modal', 'delete_nik')"
                                    class="deletebtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-red-500 focus:outline-none transition group-hover:bg-gray-50">
                                    <i class="fa-solid fa-trash-arrow-up"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('Master.create')
    @include('Master.edit')
    @include('Master.delete')

    <x-slot:script>
        <script>
            new DataTable('#table_nik', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {

                $('table').on('click', '.editbtn', function() {
                    var data = $(this).data();

                    $('#edit_id').val(data.id);
                    $('#edit_nama').val(data.nama);
                    $('#edit_nik').val(data.nik);
                });

                $('table').on('click', '.deletebtn', function() {
                    var data = $(this).data();

                    $('#delete_id').val(data.id);
                    $('#delete_nik').html(data.nik);
                });
            });
        </script>
    </x-slot:script>
</x-app-layout>
