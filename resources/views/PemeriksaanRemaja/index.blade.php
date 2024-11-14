<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Pemeriksaan Remaja') }}
        </h2>
    </x-slot>

    <div class="flex space-x-2">
        <div class="h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_pemeriksaan_remaja')"
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
                <button x-data x-on:click.prevent="$dispatch('open-modal', 'export_pemeriksaan_remaja')"
                    class="openbtn bg-green-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
                    Export Excel
                </button>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table id="table_remaja">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tgl. Periksa</th>
                    <th scope="col">Pemberian Vitamin</th>
                    <th scope="col">Petugas Pemeriksa</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemeriksaanRemajas as $pemeriksaan)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            <a class="hover:text-orange-400 duration-300"
                                href="{{ route('pemeriksaanRemaja-show', $pemeriksaan->id) }}">{{ $pemeriksaan->remaja->nama }}</a>
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ date_format(date_create($pemeriksaan->tanggal_pemeriksaan), 'd/m/Y') }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->pemberian_vitamin }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $pemeriksaan->employee->nama }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data 
                                    data-id="{{ $pemeriksaan->id }}"
                                    data-remaja-id="{{ $pemeriksaan->remaja->id }}" 
                                    data-employee-id="{{ $pemeriksaan->employee->id }}"
                                    data-tanggal-pemeriksaan="{{ $pemeriksaan->tanggal_pemeriksaan }}"
                                    data-berat-badan="{{ $pemeriksaan->berat_badan }}"
                                    data-tinggi-badan="{{ $pemeriksaan->tinggi_badan }}"
                                    data-tekanan-darah="{{ $pemeriksaan->tekanan_darah }}"
                                    data-konseling-kesehatan="{{ $pemeriksaan->konseling_kesehatan }}"
                                    data-pemberian-vitamin="{{ $pemeriksaan->pemberian_vitamin }}"
                                    data-catatan="{{ $pemeriksaan->catatan }}"
                                    x-on:click="$dispatch('open-modal', 'edit_pemeriksaan_remaja')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-green-500 bg-white hover:text-green-700 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $pemeriksaan->id }} data-nama="{{ $pemeriksaan->remaja->nama }}"
                                    href="javascript:void(0);" x-data=""
                                    x-on:click="$dispatch('open-modal', 'delete_pemeriksaan_remaja')"
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
    @include('PemeriksaanRemaja.create')
    @include('PemeriksaanRemaja.edit')
    @include('PemeriksaanRemaja.delete')
    @include('PemeriksaanRemaja.export')

    <x-slot:script>
        
        <script>
            new DataTable('#table_remaja', {
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
                    var data = $(this).data();

                    $('#edit_id').val(data.id);
                    $('#edit_remaja_id').val(data.remajaId).trigger('change');
                    $('#edit_employee_id').val(data.employeeId).trigger('change');
                    $('#edit_tanggal_pemeriksaan').val(data.tanggalPemeriksaan);
                    $('#edit_berat_badan').val(data.beratBadan);
                    $('#edit_tinggi_badan').val(data.tinggiBadan);
                    $('#edit_tekanan_darah').val(data.tekananDarah);
                    $('#edit_konseling_kesehatan').val(data.konselingKesehatan);
                    $('#edit_pemberian_vitamin').val(data.pemberianVitamin).trigger('change');
                    $('#edit_catatan').val(data.catatan);
                });

                $('table').on('click', '.deletebtn', function() {
                    var data = $(this).data();

                    $('#delete_id').val(data.id);
                    $('#delete_nama').html(data.nama);
                });
            });
        </script>
    </x-slot:script>

</x-app-layout>
