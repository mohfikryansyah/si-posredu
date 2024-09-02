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
            <button x-data x-on:click.prevent="$dispatch('open-modal', 'add_ibu')"
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
        <table id="table_ibu">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Suami</th>
                    <th scope="col">Lahir</th>
                    <th scope="col">Gol. Darah</th>
                    <th scope="col">Hamil Ke</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moms as $mom)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            <a href="javascript:void(0);" x-data data-id="{{ $mom->id }}"
                                data-nama="{{ $mom->nama }}" data-nama-suami="{{ $mom->nama_suami }}"
                                data-tempat-tanggal-lahir="{{ $mom->tempat_tanggal_lahir }}"
                                data-alamat="{{ $mom->alamat }}" data-pekerjaan="{{ $mom->pekerjaan }}"
                                data-golongan-darah="{{ $mom->golongan_darah }}"
                                data-nomor-kehamilan="{{ $mom->nomor_kehamilan }}" data-no-tlp="{{ $mom->no_tlp }}"
                                data-tanggal-pendaftaran="{{ $mom->tanggal_pendaftaran }}"
                                x-on:click="$dispatch('open-modal', 'show_ibu')"
                                class="showbtn hover:text-orange-400">
                                {{ $mom->nama }}
                            </a>
                        </th>
                        <td class="whitespace-nowrap" title="{{ $mom->nama_suami }}">
                            {{ $mom->nama_suami }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->tempat_tanggal_lahir }}
                        </td>
                        <td>
                            {{ $mom->golongan_darah }}
                        </td>
                        <td>
                            {{ $mom->nomor_kehamilan }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data data-id="{{ $mom->id }}"
                                    data-nama="{{ $mom->nama }}" data-nama-suami="{{ $mom->nama_suami }}"
                                    data-tempat-tanggal-lahir="{{ $mom->tempat_tanggal_lahir }}"
                                    data-alamat="{{ $mom->alamat }}" data-pekerjaan="{{ $mom->pekerjaan }}"
                                    data-golongan-darah="{{ $mom->golongan_darah }}"
                                    data-nomor-kehamilan="{{ $mom->nomor_kehamilan }}"
                                    data-no-tlp="{{ $mom->no_tlp }}"
                                    data-tanggal-pendaftaran="{{ $mom->tanggal_pendaftaran }}"
                                    x-on:click="$dispatch('open-modal', 'edit_ibu')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-green-500 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $mom->id }} data-nama="{{ $mom->nama }}"
                                    href="javascript:void(0);" x-data=""
                                    x-on:click="$dispatch('open-modal', 'delete_ibu')"
                                    class="deletebtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-red-500 focus:outline-none transition">
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
    @include('Ibu.create')
    @include('Ibu.edit')
    @include('Ibu.delete')
    @include('Ibu.show')

    <x-slot:script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_ibu', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $('table').on('click', '.editbtn', function() {
                    var data = $(this).data();

                    $('#edit_id').val(data.id);
                    $('#edit_nama').val(data.nama);
                    $('#edit_nama_suami').val(data.namaSuami);
                    $('#edit_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_pekerjaan').val(data.pekerjaan);
                    $('#edit_golongan_darah').val(data.golonganDarah);
                    $('#edit_nomor_kehamilan').val(data.nomorKehamilan);
                    $('#edit_no_tlp').val(data.noTlp);
                    $('#edit_tanggal_pendaftaran').val(data.tanggalPendaftaran);
                });

                $('table').on('click', '.showbtn', function() {
                    var data = $(this).data();

                    $('#show_id').val(data.id);
                    $('#show_nama').val(data.nama);
                    $('#show_nama_suami').val(data.namaSuami);
                    $('#show_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#show_alamat').val(data.alamat);
                    $('#show_pekerjaan').val(data.pekerjaan);
                    $('#show_golongan_darah').val(data.golonganDarah);
                    $('#show_nomor_kehamilan').val(data.nomorKehamilan);
                    $('#show_no_tlp').val(data.noTlp);
                    $('#show_tanggal_pendaftaran').val(data.tanggalPendaftaran);
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
