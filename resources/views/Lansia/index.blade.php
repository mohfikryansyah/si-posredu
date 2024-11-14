<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Lansia') }}
        </h2>
    </x-slot>

    <div class="flex space-x-2">
        <div class="h-auto rounded-lg py-5">
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
        <div class="h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <button x-data x-on:click.prevent="$dispatch('open-modal', 'export_lansia')"
                    class="openbtn bg-green-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
                    Export Excel
                </button>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table id="table_lansia">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Lahir</th>
                    <th scope="col">Gol. Darah</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tgl. Pendaftaran</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lansias as $lansia)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            <a href="javascript:void(0);" x-data 
                            data-id="{{ $lansia->id }}"
                            data-nik="{{ $lansia->nik }}"
                            data-nama="{{ $lansia->nama }}" 
                            data-tanggal-pendaftaran="{{ $lansia->tanggal_pendaftaran }}"
                            data-tempat-tanggal-lahir="{{ $lansia->tempat_tanggal_lahir }}"
                            data-alamat="{{ $lansia->alamat }}" 
                            data-pekerjaan="{{ $lansia->pekerjaan }}"
                            data-golongan-darah="{{ $lansia->golongan_darah }}"
                            data-no-tlp="{{ $lansia->no_tlp }}"
                            x-on:click="$dispatch('open-modal', 'show_lansia')"
                                class="showbtn hover:text-orange-400">
                                {{ $lansia->nama }}
                            </a>
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $lansia->nik }}
                        </td>
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
                            {{ $lansia->tanggal_pendaftaran }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data 
                                    data-id="{{ $lansia->id }}"
                                    data-nik="{{ $lansia->nik }}"
                                    data-nama="{{ $lansia->nama }}" 
                                    data-tanggal-pendaftaran="{{ $lansia->tanggal_pendaftaran }}"
                                    data-tempat-tanggal-lahir="{{ $lansia->tempat_tanggal_lahir }}"
                                    data-alamat="{{ $lansia->alamat }}" 
                                    data-pekerjaan="{{ $lansia->pekerjaan }}"
                                    data-golongan-darah="{{ $lansia->golongan_darah }}"
                                    data-no-tlp="{{ $lansia->no_tlp }}"
                                    x-on:click="$dispatch('open-modal', 'edit_lansia')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-green-500 bg-white hover:text-green-700 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $lansia->id }} data-nama="{{ $lansia->nama }}"
                                    href="javascript:void(0);" x-data=""
                                    x-on:click="$dispatch('open-modal', 'delete_lansia')"
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

    <!-- MODAL --->
    @include('Lansia.create')
    @include('Lansia.edit')
    @include('Lansia.delete')
    @include('Lansia.show')
    @include('Lansia.export')

    <x-slot:script>
        
        <script>
            new DataTable('#table_lansia', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {

                $(".select2nama").select2({
                    width: 'resolve' // need to override the changed default
                });
                
                $('table').on('click', '.editbtn', function() {
                    var data = $(this).data()

                    $('#edit_id').val(data.id);
                    $('#edit_nama').val(data.nama);
                    $('#edit_nik').val(data.nik);
                    $('#edit_tanggal_pendaftaran').val(data.tanggalPendaftaran);
                    $('#edit_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_pekerjaan').val(data.pekerjaan);
                    $('#edit_golongan_darah').val(data.golonganDarah);
                    $('#edit_no_tlp').val(data.noTlp);
                });
                
                $('table').on('click', '.showbtn', function() {
                    var data = $(this).data()

                    $('#show_id').val(data.id);
                    $('#show_nama').val(data.nama);
                    $('#show_nik').val(data.nik);
                    $('#show_tanggal_pendaftaran').val(data.tanggalPendaftaran);
                    $('#show_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#show_alamat').val(data.alamat);
                    $('#show_pekerjaan').val(data.pekerjaan);
                    $('#show_golongan_darah').val(data.golonganDarah);
                    $('#show_no_tlp').val(data.noTlp);
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
