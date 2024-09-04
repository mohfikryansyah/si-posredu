<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Anak') }}
        </h2>
    </x-slot>

    <div class="w-full h-auto rounded-lg py-5">
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
            <!-- Button to open modal -->
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_anak')"
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
        <table id="table_anak">
            <thead>
                <tr>
                    <th scope="col">Nama Anak</th>
                    <th scope="col">Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nama Ibu</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tgl. Mendaftar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($children as $child)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            <a href="javascript:void(0);" x-data data-id="{{ $child->id }}"
                                data-nik="{{ $child->nik }}"
                                data-nama="{{ $child->nama }}" data-nama-ibu="{{ $child->nama_ibu }}"
                                data-nama-ayah="{{ $child->nama_ayah }}"
                                data-jenis-kelamin="{{ $child->jenis_kelamin }}"
                                data-tempat-tanggal-lahir="{{ $child->tempat_tanggal_lahir }}"
                                data-alamat="{{ $child->alamat }}" data-no-tlp="{{ $child->no_tlp }}"
                                data-tanggal-pendaftaran="{{ $child->tanggal_pendaftaran }}"
                                x-on:click="$dispatch('open-modal', 'show_anak')"
                                class="showbtn hover:text-orange-400">
                                {{ $child->nama }}
                            </a>
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $child->tempat_tanggal_lahir }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $child->jenis_kelamin }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $child->nama_ibu }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $child->alamat }}
                        </td>
                        <td>
                            {{ $child->tanggal_pendaftaran }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data data-id="{{ $child->id }}"
                                    data-nik="{{ $child->nik }}"
                                    data-nama="{{ $child->nama }}" data-nama-ibu="{{ $child->nama_ibu }}"
                                    data-nama-ayah="{{ $child->nama_ayah }}"
                                    data-jenis-kelamin="{{ $child->jenis_kelamin }}"
                                    data-tempat-tanggal-lahir="{{ $child->tempat_tanggal_lahir }}"
                                    data-alamat="{{ $child->alamat }}" data-no-tlp="{{ $child->no_tlp }}"
                                    data-tanggal-pendaftaran="{{ $child->tanggal_pendaftaran }}"
                                    x-on:click="$dispatch('open-modal', 'edit_anak')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $child->id }} data-nama="{{ $child->nama }}"
                                    href="javascript:void(0);" x-on:click="$dispatch('open-modal', 'delete_anak')"
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
    @include('Anak.create')
    @include('Anak.edit')
    @include('Anak.delete')
    @include('Anak.show')

    <x-slot:script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_anak', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $('table').on('click', '.editbtn', function() {
                    var data = $(this).data();

                    $('#edit_id').val(data.id);
                    $('#edit_nik').val(data.nik);
                    $('#edit_nama').val(data.nama);
                    $('#edit_nama_ibu').val(data.namaIbu);
                    $('#edit_nama_ayah').val(data.namaAyah);
                    $('#edit_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_no_tlp').val(data.noTlp);
                    $('#edit_jenis_kelamin').val(data.jenisKelamin);
                    $('#edit_tanggal_pendaftaran').val(data.tanggalPendaftaran);
                });

                $('table').on('click', '.showbtn', function() {
                    var data = $(this).data();

                    $('#show_id').val(data.id);
                    $('#show_nik').val(data.nik);
                    $('#show_nama').val(data.nama);
                    $('#show_nama_ibu').val(data.namaIbu);
                    $('#show_nama_ayah').val(data.namaAyah);
                    $('#show_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#show_alamat').val(data.alamat);
                    $('#show_no_tlp').val(data.noTlp);
                    $('#show_jenis_kelamin').val(data.jenisKelamin);
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
