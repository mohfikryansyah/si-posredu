<x-app-layout>
    <div class="md:grid grid-cols-3 gap-5">
        <div class="col-span-2">
            <header class="w-full bg-white rounded-lg shadow">
                <div class="py-6 px-4">
                    <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                        {{ __('Daftar Jadwal Pelayanan') }}
                    </h2>
                </div>
            </header>

            <div class="w-full relative overflow-x-auto rounded-lg shadow-md sm:rounded-lg bg-white my-5">
                <table id="table_pelayanan">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Akhir</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelayanans as $pelayanan)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th class="whitespace-nowrap">
                                    {{ $pelayanan->nama }}
                                </th>
                                <td class="whitespace-nowrap">
                                    {{ $pelayanan->tanggal_pelayanan }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $pelayanan->start }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $pelayanan->end }}
                                </td>
                                <td class="whitespace-nowrap" title="{{ $pelayanan->deskripsi }}">
                                    {{ Str::limit($pelayanan->deskripsi, 10) }}
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <a href="{{ route('jadwal-pelayanan.edit', ['jadwal_pelayanan' => $pelayanan->id]) }}"
                                            class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a x-data data-id={{ $pelayanan->id }} data-nama="{{ $pelayanan->nama }}"
                                            href="javascript:void(0);"
                                            x-on:click="$dispatch('open-modal', 'delete_layanan')"
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
        </div>
        <div class="col-sm-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <h1 class="bg-orange-400 px-5 py-2.5 text-gray-100 font-medium">Buat Jadwal Pelayanan</h1>
                <div class="p-5">
                    <form action="{{ route('jadwal-pelayanan.store') }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Layanan</label>
                            <x-text-input name="nama" id="nama"
                                class="{{ $errors->add_pelayanan->has('nama') ? 'border-red-500' : 'border-gray-300' }}"></x-text-input>
                            @error('nama', 'add_pelayanan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_pelayanan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelayanan</label>
                            <x-date-input name="tanggal_pelayanan" id="tanggal_pelayanan"
                                class="{{ $errors->add_pelayanan->has('tanggal_pelayanan') ? 'border-red-500' : 'border-gray-300' }}" autocomplete="off"></x-date-input>
                            @error('tanggal_pelayanan', 'add_pelayanan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea rows="4"
                                class="{{ $errors->add_pelayanan->has('deskripsi') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                name="deskripsi" id="deskripsi" placeholder="Deskripsi singkat tentang layanan"></textarea>
                            @error('deskripsi', 'add_pelayanan')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-5">
                            <div>
                                <label for="start"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu mulai:</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="time" id="start" name="start"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="00:00" required />
                                    @error('start', 'add_pelayanan')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="end"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu berakhir:</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="time" id="end" name="end"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="00:00" required />
                                    @error('end', 'add_pelayanan')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <x-save-button>Simpan</x-save-button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL --->
    @include('Pelayanan.delete')

    <x-slot:script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_pelayanan', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
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
