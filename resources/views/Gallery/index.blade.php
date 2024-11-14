<x-app-layout>
    <div class="col-span-2">
        <header class="w-full bg-white rounded-lg shadow">
            <div class="py-6 px-4">
                <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                    {{ __('Dokumentasi Kegiatan') }}
                </h2>
            </div>
        </header>

        <div class="w-full h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <a href="{{ route('gallery.create') }}"
                    class="openbtn bg-orange-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
                    <svg class="me-1 -ms-1 w-5 h-5 font-bold" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Tambah Data
                </a>
            </div>
        </div>

        <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table id="table_gallery">
                <thead>
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $gallery)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <a x-data data-path="{{ $gallery->path }}" href="javascript:void(0)"
                                    x-on:click="$dispatch('open-modal', 'show_gallery')"
                                    class="showbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $gallery->path) }}"
                                        alt="{{ $gallery->title }}">
                                </a>
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $gallery->title }}</div>
                                </div>
                            </th>
                            <td class="whitespace-nowrap">
                                {{ date_format(date_create($gallery->created_at), 'd M, Y') }}
                            </td>
                            <td>
                                <div class="flex items-center">
                                    <a href="{{ route('gallery.edit', ['gallery' => $gallery->id]) }}"
                                        class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-green-500 bg-white hover:text-green-700 focus:outline-none transition">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a x-data data-id={{ $gallery->id }} href="javascript:void(0);"
                                        x-on:click="$dispatch('open-modal', 'delete_gallery')"
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
    </div>

    <!-- MODAL --->
    {{-- @include('gallery.create') --}}
    {{-- @include('gallery.edit') --}}
    @include('Gallery.show')
    @include('Gallery.delete')

    <x-slot:script>
        
        <script>
            new DataTable('#table_gallery', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $('table').on('click', '.deletebtn', function() {
                    var id = $(this).data('id');
                    console.log(id);
                    

                    $('#delete_id').val(id);
                });

                $('table').on('click', '.showbtn', function() {
                    var path = $(this).data('path');

                    var imgModal = document.getElementById('imgModal');
                    imgModal.src = '/storage/' + path;
                });
            });
        </script>
    </x-slot:script>

</x-app-layout>
