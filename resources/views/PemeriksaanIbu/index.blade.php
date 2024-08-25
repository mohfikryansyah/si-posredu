<x-app-layout>
    <x-slot:css>
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    </x-slot:css>

    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-orange-400 leading-tight">
            {{ __('Data Pemeriksaan Ibu Hamil') }}
        </h2>
    </x-slot>

    <div class="w-full h-auto rounded-lg py-5">
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
            <!-- Button to open modal -->
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_pemeriksaan_ibu')"
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
        <table id="table_pemeriksaan_ibu">
            <thead>
                <tr>
                    <th scope="col" class="whitespace-normal">Nama</th>
                    <th scope="col" class="whitespace-normal">Berat Badan</th>
                    <th scope="col" class="whitespace-normal">Tinggi Badan</th>
                    <th scope="col" class="whitespace-normal">Riwayat Penyakit</th>
                    <th scope="col" class="whitespace-normal">Catatan</th>
                    <th scope="col" class="whitespace-normal">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($momsCek as $mom)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap text-orange-300 px-6 py-4">
                            <a class="hover:text-orange-400 duration-300"
                                href="{{ route('pemeriksaanIbu-show', $mom->id) }}">{{ $mom->ibuHamil->nama }}</a>
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->berat_badan . ' kg' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->tinggi_badan . ' cm' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $mom->riwayat_penyakit }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ Str::limit($mom->catatan, 31, '...') }}
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
                                    <a data-id="{{ $mom->id }}" data-ibu-id="{{ $mom->ibuHamil->id }}"
                                        data-employee-id="{{ $mom->employee_id }}"
                                        data-berat-badan="{{ $mom->berat_badan }}"
                                        data-tinggi-badan="{{ $mom->tinggi_badan }}"
                                        data-tekanan-darah-sistolik="{{ $mom->tekanan_darah_sistolik }}"
                                        data-tekanan-darah-diastolik="{{ $mom->tekanan_darah_diastolik }}"
                                        data-kadar-gula-darah="{{ $mom->kadar_gula_darah }}"
                                        data-kadar-kolestrol="{{ $mom->kadar_kolestrol }}"
                                        data-kadar-asam-urat="{{ $mom->kadar_asam_urat }}"
                                        data-riwayat-penyakit="{{ $mom->riwayat_penyakit }}"
                                        data-catatan="{{ $mom->catatan }}" href="javascript:void(0);" x-data=""
                                        x-on:click="$dispatch('open-modal', 'edit_pemeriksaan_ibu')"
                                        class="editbtn block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                    <a data-id={{ $mom->id }} data-nama="{{ $mom->ibuHamil->nama }}"
                                        href="javascript:void(0);" x-data=""
                                        x-on:click="$dispatch('open-modal', 'delete_pemeriksaan_ibu')"
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
    @include('PemeriksaanIbu.create')
    @include('PemeriksaanIbu.edit')
    @include('PemeriksaanIbu.delete')

    <x-slot:script>
        <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_pemeriksaan_ibu', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".select2nama").select2({
                    width: 'resolve' // need to override the changed default
                });
                $(".select2employee").select2({
                    width: 'resolve' // need to override the changed default
                });

                $('table').on('click', '.editbtn', function() {
                    var id = $(this).data('id');
                    var ibu_id = $(this).data('ibu-id');
                    var employee_id = $(this).data('employee-id');
                    var berat_badan = $(this).data('berat-badan');
                    var tinggi_badan = $(this).data('tinggi-badan');
                    var tekanan_darah_sistolik = $(this).data('tekanan-darah-sistolik');
                    var tekanan_darah_diastolik = $(this).data('tekanan-darah-diastolik');
                    var kadar_gula_darah = $(this).data('kadar-gula-darah');
                    var kadar_asam_urat = $(this).data('kadar-asam-urat');
                    var kadar_kolestrol = $(this).data('kadar-kolestrol');
                    var riwayat_penyakit = $(this).data('riwayat-penyakit');
                    var catatan = $(this).data('catatan');

                    $('#edit_id').val(id);
                    $('#edit_ibu_id').val(ibu_id).trigger('change');
                    $('#edit_employee_id').val(employee_id).trigger('change');
                    $('#edit_berat_badan').val(berat_badan);
                    $('#edit_tinggi_badan').val(tinggi_badan);
                    $('#edit_tekanan_darah_sistolik').val(tekanan_darah_sistolik);
                    $('#edit_tekanan_darah_diastolik').val(tekanan_darah_diastolik);
                    $('#edit_kadar_gula_darah').val(kadar_gula_darah);
                    $('#edit_kadar_asam_urat').val(kadar_asam_urat);
                    $('#edit_kadar_kolestrol').val(kadar_kolestrol);
                    $('#edit_riwayat_penyakit').val(riwayat_penyakit);
                    $('#edit_catatan').val(catatan);
                });

                $('table').on('click', '.deletebtn', function() {
                    var id = $(this).data('id');

                    $('#delete_id').val(id);
                });
            });
        </script>
    </x-slot:script>

</x-app-layout>
