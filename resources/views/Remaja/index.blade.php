<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Remaja') }}
        </h2>
    </x-slot>

    <div class="flex space-x-2">
        <div class="h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add_remaja')"
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
                <button x-data x-on:click.prevent="$dispatch('open-modal', 'export_remaja')"
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
                    <th scope="col">NIK</th>
                    <th scope="col">Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nama Orang Tua</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($remajas as $remaja)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            <a href="javascript:void(0);" x-data data-id="{{ $remaja->id }}"
                                data-nama="{{ $remaja->nama }}" data-nik="{{ $remaja->nik }}"
                                data-jenis-kelamin="{{ $remaja->jenis_kelamin }}"
                                data-tanggal-pendaftaran="{{ $remaja->tanggal_pendaftaran }}"
                                data-tempat-tanggal-lahir="{{ $remaja->tempat_tanggal_lahir }}"
                                data-usia="{{ $remaja->usia }}" data-alamat="{{ $remaja->alamat }}"
                                data-no-tlp="{{ $remaja->no_tlp }}"
                                data-nama-orang-tua="{{ $remaja->nama_orang_tua }}"
                                data-pekerjaan-orang-tua="{{ $remaja->pekerjaan_orang_tua }}"
                                data-golongan-darah="{{ $remaja->golongan_darah }}"
                                x-on:click="$dispatch('open-modal', 'show_remaja')" class="showbtn hover:text-orange-400">
                                {{ $remaja->nama }}
                            </a>
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $remaja->nik }}
                        </td>
                        <td>
                            {{ $remaja->tempat_tanggal_lahir }}
                        </td>
                        <td>
                            {{ $remaja->jenis_kelamin }}
                        </td>
                        <td>
                            {{ $remaja->nama_orang_tua }}
                        </td>
                        <td>
                            <div class="flex items-center">
                                <a href="javascript:void(0);" x-data data-id="{{ $remaja->id }}"
                                    data-nama="{{ $remaja->nama }}" data-nik="{{ $remaja->nik }}"
                                    data-jenis-kelamin="{{ $remaja->jenis_kelamin }}"
                                    data-tanggal-pendaftaran="{{ $remaja->tanggal_pendaftaran }}"
                                    data-tempat-tanggal-lahir="{{ $remaja->tempat_tanggal_lahir }}"
                                    data-usia="{{ $remaja->usia }}" data-alamat="{{ $remaja->alamat }}"
                                    data-no-tlp="{{ $remaja->no_tlp }}"
                                    data-nama-orang-tua="{{ $remaja->nama_orang_tua }}"
                                    data-pekerjaan-orang-tua="{{ $remaja->pekerjaan_orang_tua }}"
                                    data-golongan-darah="{{ $remaja->golongan_darah }}"
                                    x-on:click="$dispatch('open-modal', 'edit_remaja')"
                                    class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-green-500 focus:outline-none transition">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-id={{ $remaja->id }} data-nama="{{ $remaja->nama }}"
                                    href="javascript:void(0);" x-data=""
                                    x-on:click="$dispatch('open-modal', 'delete_remaja')"
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
    @include('Remaja.create')
    @include('Remaja.edit')
    @include('Remaja.delete')
    @include('Remaja.show')
    @include('Remaja.export')

    <x-slot:script>
        
        <script>
            new DataTable('#table_remaja', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                let nikValid = false;

                $('#check-nik').on('click', function(event) {
                    event.preventDefault();
                    let nik = $('#nik').val();

                    if (nik === '') {
                        $('#result').text('Harap masukkan NIK').css('color', 'red');
                        nikValid = false;
                        return;
                    }

                    $.ajax({
                        url: '/check-nik',
                        type: 'GET',
                        data: { nik: nik },
                        success: function(response) {
                            $('#result').text(response.message).css('color', 'green');
                            nikValid = true;
                        },
                        error: function(xhr) {
                            $('#result').text(xhr.responseJSON.message).css('color', 'red');
                            nikValid = false;
                        }
                    });
                });

                $('#form-ibu').on('submit', function(event) {
                    if (!nikValid) {
                        event.preventDefault();
                        alert('Silakan cek NIK terlebih dahulu sebelum menyimpan!');
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                
                $(".select2nama").select2({
                    width: 'resolve' // need to override the changed default
                });

                $('table').on('click', '.editbtn', function() {
                    var data = $(this).data();

                    $('#edit_id').val(data.id);
                    $('#edit_nama').val(data.nama);
                    $('#edit_nik').val(data.nik);
                    $('#edit_alamat').val(data.alamat);
                    $('#edit_tanggal_pendaftaran').val(data.tanggalPendaftaran);
                    $('#edit_jenis_kelamin').val(data.jenisKelamin).trigger('change');
                    $('#edit_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#edit_usia').val(data.usia);
                    $('#edit_no_tlp').val(data.noTlp);
                    $('#edit_nama_orang_tua').val(data.namaOrangTua);
                    $('#edit_pekerjaan_orang_tua').val(data.pekerjaanOrangTua);
                    $('#edit_golongan_darah').val(data.golonganDarah).trigger('change');
                });

                $('table').on('click', '.showbtn', function() {
                    var data = $(this).data();

                    $('#show_id').val(data.id);
                    $('#show_nama').val(data.nama);
                    $('#show_nik').val(data.nik);
                    $('#show_alamat').val(data.alamat);
                    $('#show_tanggal_pendaftaran').val(data.tanggalPendaftaran);
                    $('#show_jenis_kelamin').val(data.jenisKelamin).trigger('change');
                    $('#show_tempat_tanggal_lahir').val(data.tempatTanggalLahir);
                    $('#show_usia').val(data.usia);
                    $('#show_no_tlp').val(data.noTlp);
                    $('#show_nama_orang_tua').val(data.namaOrangTua);
                    $('#show_pekerjaan_orang_tua').val(data.pekerjaanOrangTua);
                    $('#show_golongan_darah').val(data.golonganDarah).trigger('change');
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
