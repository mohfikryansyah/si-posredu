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
                    <th scope="col">Nama Ayah</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Tlp</th>
                    <th scope="col">Tgl. Mendaftar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($children as $child)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap" title="{{ $child->nama }}">
                            {{ Str::limit($child->nama, 21) }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal" title="{{ $child->tempat_tanggal_lahir }}">
                            {{ Str::limit($child->tempat_tanggal_lahir, 21) }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal" title="{{ $child->jenis_kelamin }}">
                            {{ $child->jenis_kelamin }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal" title="{{ $child->nama_ibu }}">
                            {{ Str::limit($child->nama_ibu, 15) }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal" title="{{ $child->nama_ayah }}">
                            {{ Str::limit($child->nama_ayah, 15) }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal" title="{{ $child->alamat }}">
                            {{ Str::limit($child->alamat, 15) }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal" title="{{ $child->no_tlp }}">
                            {{ Str::limit($child->no_tlp, 13, ' ') }}
                        </td>
                        <td title="{{ $child->tanggal_pendaftaran }}">
                            {{ $child->tanggal_pendaftaran }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data data-id="{{ $child->id }}"
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
                    var id = $(this).data('id');
                    var name = $(this).data('nama');
                    var name_ibu = $(this).data('nama-ibu');
                    var name_ayah = $(this).data('nama-ayah');
                    var ttl = $(this).data('tempat-tanggal-lahir');
                    var alamat = $(this).data('alamat');
                    var no_tlp = $(this).data('no-tlp');
                    var jenis_kelamin = $(this).data('jenis-kelamin');
                    var tanggal_pendaftaran = $(this).data('tanggal-pendaftaran');
                    console.log(jenis_kelamin);


                    $('#edit_id').val(id);
                    $('#edit_nama').val(name);
                    $('#edit_nama_ibu').val(name_ibu);
                    $('#edit_nama_ayah').val(name_ayah);
                    $('#edit_tempat_tanggal_lahir').val(ttl);
                    $('#edit_alamat').val(alamat);
                    $('#edit_no_tlp').val(no_tlp);
                    $('#edit_jenis_kelamin').val(jenis_kelamin);
                    $('#edit_tanggal_pendaftaran').val(tanggal_pendaftaran);
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
