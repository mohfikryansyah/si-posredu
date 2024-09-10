<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Pemeriksaan Ibu Hamil') }}
        </h2>
    </x-slot>

    <div class="flex space-x-2">
        <div class="h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_pemeriksaan_ibu')"
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
                <button x-data x-on:click.prevent="$dispatch('open-modal', 'export_pemeriksaan_ibu')"
                    class="openbtn bg-green-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
                    Export Excel
                </button>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table id="table_pemeriksaan_ibu">
            <thead>
                <tr>
                    <th scope="col" class="whitespace-normal">Nama</th>
                    <th scope="col" class="whitespace-normal">Tgl. Pemeriksaan</th>
                    <th scope="col" class="whitespace-normal">Usia Kehamilan</th>
                    <th scope="col" class="whitespace-normal">Tekanan Darah</th>
                    <th scope="col" class="whitespace-normal">Petugas</th>
                    <th scope="col" class="whitespace-normal">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemeriksaanIbu as $pemeriksaan)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            <a class="hover:text-orange-400 duration-300"
                                href="{{ route('pemeriksaanIbu-show', $pemeriksaan->id) }}">{{ $pemeriksaan->ibu->nama }}</a>
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ date_format(date_create($pemeriksaan->tanggal_pemeriksaan), 'd/m/Y') }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->usia_kehamilan }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->tekanan_darah }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->employee->nama }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data data-id="{{ $pemeriksaan->id }}" data-ibu-id="{{ $pemeriksaan->ibu->id }}"
                                    data-employee-id="{{ $pemeriksaan->employee_id }}"
                                    data-tanggal-pemeriksaan="{{ $pemeriksaan->tanggal_pemeriksaan }}"
                                    data-berat-badan="{{ $pemeriksaan->berat_badan }}"
                                    data-tinggi-badan="{{ $pemeriksaan->berat_badan }}"
                                    data-usia-kehamilan="{{ $pemeriksaan->usia_kehamilan }}"
                                    data-tekanan-darah="{{ $pemeriksaan->tekanan_darah }}"
                                    data-tinggi-fundus="{{ $pemeriksaan->tinggi_fundus }}"
                                    data-denyut-jantung-janin="{{ $pemeriksaan->denyut_jantung_janin }}"
                                    data-lingkar-lengan-atas="{{ $pemeriksaan->lingkar_lengan_atas }}"
                                    data-pemeriksaan-lab="{{ $pemeriksaan->pemeriksaan_lab }}"
                                    data-suntik-tetanus-toksoid="{{ $pemeriksaan->suntik_tetanus_toksoid }}"
                                    data-keluhan="{{ $pemeriksaan->keluhan }}"
                                    data-pemberian-vitamin="{{ $pemeriksaan->pemberian_vitamin }}"
                                    data-catatan="{{ $pemeriksaan->catatan }}"
                                    x-on:click="$dispatch('open-modal', 'edit_pemeriksaan_ibu')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $pemeriksaan->id }} data-nama="{{ $pemeriksaan->ibu->nama }}"
                                    href="javascript:void(0);" x-data=""
                                    x-on:click="$dispatch('open-modal', 'delete_pemeriksaan_ibu')"
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
    @include('PemeriksaanIbu.create')
    @include('PemeriksaanIbu.edit')
    @include('PemeriksaanIbu.delete')
    @include('PemeriksaanIbu.export')

    <x-slot:script>
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
                    var tanggal_pemeriksaan = $(this).data('tanggal-pemeriksaan');
                    var berat_badan = $(this).data('berat-badan');
                    var tinggi_badan = $(this).data('tinggi-badan');
                    var usia_kehamilan = $(this).data('usia-kehamilan');
                    var tekanan_darah = $(this).data('tekanan-darah');
                    var tinggi_fundus = $(this).data('tinggi-fundus');
                    var denyut_jantung_janin = $(this).data('denyut-jantung-janin');
                    var lingkar_lengan_atas = $(this).data('lingkar-lengan-atas');
                    var pemeriksaan_lab = $(this).data('pemeriksaan-lab');
                    var suntik_tetanus_toksoid = $(this).data('suntik-tetanus-toksoid');
                    var keluhan = $(this).data('keluhan');
                    var pemberian_vitamin = $(this).data('pemberian-vitamin');
                    var catatan = $(this).data('catatan');

                    $('#edit_id').val(id);
                    $('#edit_ibu_id').val(ibu_id).trigger('change');
                    $('#edit_employee_id').val(employee_id).trigger('change');
                    $('#edit_tanggal_pemeriksaan').val(tanggal_pemeriksaan);
                    $('#edit_berat_badan').val(berat_badan);
                    $('#edit_tinggi_badan').val(tinggi_badan);
                    $('#edit_usia_kehamilan').val(usia_kehamilan);
                    $('#edit_tekanan_darah').val(tekanan_darah);
                    $('#edit_tinggi_fundus').val(tinggi_fundus);
                    $('#edit_denyut_jantung_janin').val(denyut_jantung_janin);
                    $('#edit_lingkar_lengan_atas').val(lingkar_lengan_atas);
                    $('#edit_pemeriksaan_lab').val(pemeriksaan_lab);
                    $('#edit_suntik_tetanus_toksoid').val(suntik_tetanus_toksoid).trigger('change');
                    $('#edit_keluhan').val(keluhan);
                    $('#edit_pemberian_vitamin').val(pemberian_vitamin);
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
