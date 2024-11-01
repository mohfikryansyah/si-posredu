<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Detail Pemeriksaan Ibu Hamil') }}
        </h2>
    </x-slot>

    <div class="w-full p-5 bg-white mt-4 rounded-md shadow-sm">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight text-center">
            {{ $mom->ibu->nama }}
        </h2>
        <h2 class="font-semibold md:text-lg text-md text-gray-600 leading-tight text-center">
            {{ $mom->ibu->tempat_tanggal_lahir }}
        </h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white mt-4">
        <table id="table_pemeriksaan_ibu">
            <thead>
                <tr>
                    <th scope="col" class="whitespace-normal">Petugas</th>
                    <th scope="col" class="whitespace-normal">Tgl. Pemeriksaan</th>
                    <th scope="col" class="whitespace-normal">Usia Kehamilan</th>
                    <th scope="col" class="whitespace-normal">Berat Badan</th>
                    <th scope="col" class="whitespace-normal">Tinggi Badan</th>
                    <th scope="col" class="whitespace-normal">Tinggi Fundus</th>
                    <th scope="col" class="whitespace-normal">Denyut Jantung Janin</th>
                    <th scope="col" class="whitespace-normal">Lingkar Lengan Atas</th>
                    <th scope="col" class="whitespace-normal">Pemeriksaan Lab</th>
                    <th scope="col" class="whitespace-normal">Suntik Tetanus Toksoid</th>
                    <th scope="col" class="whitespace-normal">Keluhan</th>
                    <th scope="col" class="whitespace-normal">Pemberian Vitamin</th>
                    <th scope="col" class="whitespace-normal">Tekanan Darah</th>
                    <th scope="col" class="whitespace-normal">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allPemeriksaanIbuSaatIni as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            {{ $item->employee->nama }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ date_format(date_create($item->tanggal_pemeriksaan), 'd/m/Y') }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->usia_kehamilan . ' Minggu' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->berat_badan . ' kg' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->tinggi_badan . ' cm' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->tinggi_fundus . ' cm' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->denyut_jantung_janin . ' bpm' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->lingkar_lengan_atas . ' cm' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->pemeriksaan_lab }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->suntik_tetanus_toksoid }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->keluhan }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->pemberian_vitamin }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->tekanan_darah . ' mmHg' }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data data-id="{{ $item->id }}"
                                    data-ibu-id="{{ $item->ibu->id }}" data-employee-id="{{ $item->employee_id }}"
                                    data-tanggal-pemeriksaan="{{ $item->tanggal_pemeriksaan }}"
                                    data-berat-badan="{{ $item->berat_badan }}"
                                    data-tinggi-badan="{{ $item->tinggi_badan }}"
                                    data-usia-kehamilan="{{ $item->usia_kehamilan }}"
                                    data-tekanan-darah="{{ $item->tekanan_darah }}"
                                    data-tinggi-fundus="{{ $item->tinggi_fundus }}"
                                    data-denyut-jantung-janin="{{ $item->denyut_jantung_janin }}"
                                    data-lingkar-lengan-atas="{{ $item->lingkar_lengan_atas }}"
                                    data-pemeriksaan-lab="{{ $item->pemeriksaan_lab }}"
                                    data-suntik-tetanus-toksoid="{{ $item->suntik_tetanus_toksoid }}"
                                    data-keluhan="{{ $item->keluhan }}"
                                    data-pemberian-vitamin="{{ $item->pemberian_vitamin }}"
                                    data-catatan="{{ $item->catatan }}"
                                    x-on:click="$dispatch('open-modal', 'edit_pemeriksaan_ibu')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $item->id }} data-nama="{{ $item->ibu->nama }}"
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
    @include('PemeriksaanIbu.edit')
    @include('PemeriksaanIbu.delete')

    <x-slot:script>

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
