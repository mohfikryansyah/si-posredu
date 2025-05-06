<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Detail Pemeriksaan Remaja') }}
        </h2>
    </x-slot>

    <div class="w-full p-5 bg-white mt-4 rounded-md shadow-sm">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight text-center">
            {{ $remaja->remaja->nama }}
        </h2>
        <h2 class="font-semibold md:text-lg text-md text-gray-600 leading-tight text-center">
            {{ $remaja->remaja->tempat_tanggal_lahir }}
        </h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white mt-4">
        <table id="table_pemeriksaan_remaja">
            <thead>
                <tr>
                    <th scope="col" class="whitespace-normal">Petugas</th>
                    <th scope="col" class="whitespace-normal">Tgl. Pemeriksaan</th>
                    <th scope="col" class="whitespace-normal">Berat Badan</th>
                    <th scope="col" class="whitespace-normal">Tinggi Badan</th>
                    <th scope="col" class="whitespace-normal">Tekanan Darah</th>
                    <th scope="col" class="whitespace-normal">Konseling Kesehatan</th>
                    <th scope="col" class="whitespace-normal">Pemberian Vitamin</th>
                    <th scope="col" class="whitespace-normal">Catatan</th>
                    @role(['ADMIN', 'KADER'])
                        <th scope="col" class="whitespace-normal">Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($allPemeriksaanRemajaSaatIni as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            {{ $item->employee->nama }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ date_format(date_create($item->tanggal_pemeriksaan), 'd/m/Y') }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->berat_badan . ' kg' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->tinggi_badan . ' cm' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->tekanan_darah . ' mmHg' }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->konseling_kesehatan }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->pemberian_vitamin }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $item->catatan }}
                        </td>
                        @role(['ADMIN', 'KADER'])
                            <td>
                                <div class="flex items-center">
                                    <a href="javascript:void(0);" x-data data-id="{{ $item->id }}"
                                        data-remaja-id="{{ $item->remaja->id }}"
                                        data-employee-id="{{ $item->employee_id }}"
                                        data-tanggal-pemeriksaan="{{ $item->tanggal_pemeriksaan }}"
                                        data-berat-badan="{{ $item->berat_badan }}"
                                        data-tinggi-badan="{{ $item->tinggi_badan }}"
                                        data-tekanan-darah="{{ $item->tekanan_darah }}"
                                        data-konseling-kesehatan="{{ $item->konseling_kesehatan }}"
                                        data-pemberian-vitamin="{{ $item->pemberian_vitamin }}"
                                        data-catatan="{{ $item->catatan }}"
                                        x-on:click="$dispatch('open-modal', 'edit_pemeriksaan_remaja')"
                                        class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-green-500 bg-white hover:text-green-700 focus:outline-none transition">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a data-id={{ $item->id }} data-nama="{{ $item->remaja->nama }}"
                                        href="javascript:void(0);" x-data=""
                                        x-on:click="$dispatch('open-modal', 'delete_pemeriksaan_remaja')"
                                        class="deletebtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-red-500 bg-white hover:text-red-700 focus:outline-none transition">
                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                    </a>
                                </div>
                            </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- MODAL --->
    @include('PemeriksaanRemaja.edit')
    @include('PemeriksaanRemaja.delete')

    <x-slot:script>

        <script>
            new DataTable('#table_pemeriksaan_remaja', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".select2nama").select2({
                    width: 'resolve'
                });
                $(".select2employee").select2({
                    width: 'resolve'
                });

                $('table').on('click', '.editbtn', function() {
                    var id = $(this).data('id');
                    var remaja_id = $(this).data('remaja-id');
                    var employee_id = $(this).data('employee-id');
                    var tanggal_pemeriksaan = $(this).data('tanggal-pemeriksaan');
                    var berat_badan = $(this).data('berat-badan');
                    var tinggi_badan = $(this).data('tinggi-badan');
                    var tekanan_darah = $(this).data('tekanan-darah');
                    var catatan = $(this).data('catatan');
                    var konseling_kesehatan = $(this).data('konseling-kesehatan');
                    var riwayat_penyakit = $(this).data('riwayat-penyakit');
                    var pemberian_vitamin = $(this).data('pemberian-vitamin');

                    $('#edit_id').val(id);
                    $('#edit_remaja_id').val(remaja_id).trigger('change');
                    $('#edit_employee_id').val(employee_id).trigger('change');
                    $('#edit_tanggal_pemeriksaan').val(tanggal_pemeriksaan);
                    $('#edit_berat_badan').val(berat_badan);
                    $('#edit_tinggi_badan').val(tinggi_badan);
                    $('#edit_tekanan_darah').val(tekanan_darah);
                    $('#edit_catatan').val(catatan);
                    $('#edit_konseling_kesehatan').val(konseling_kesehatan);
                    $('#edit_pemberian_vitamin').val(pemberian_vitamin);
                    $('#edit_riwayat_penyakit').val(riwayat_penyakit);
                });

                $('table').on('click', '.deletebtn', function() {
                    var id = $(this).data('id');

                    $('#delete_id').val(id);
                });
            });
        </script>
    </x-slot:script>

</x-app-layout>
