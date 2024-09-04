<x-app-layout>
    <div class="col-span-2">
        <header class="w-full bg-white rounded-lg shadow">
            <div class="py-6 px-4">
                <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                    {{ __('Daftar Artikel') }}
                </h2>
            </div>
        </header>

        <div class="w-full h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <a href="{{ route('posts.create') }}"
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
            <table id="table_post">
                <thead>
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th class="whitespace-nowrap" title="{{ $post->title }}">
                                <a class="hover:text-orange-400 duration-300"
                                    href="{{ route('posts.show', ['post' => $post->slug]) }}">{{ Str::limit($post->title, 80) }}</a>
                            </th>
                            <td class="whitespace-nowrap">
                                {{ $post->category->title }}
                            </td>
                            <td class="whitespace-nowrap">
                                {{ date_format(date_create($post->created_at), 'd M, Y') }}
                            </td>
                            <td>
                                <div class="flex items-center">
                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                        class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a x-data data-id={{ $post->id }} data-title="{{ $post->title }}"
                                        href="javascript:void(0);" x-on:click="$dispatch('open-modal', 'delete_post')"
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

    <!-- MODAL --->
    {{-- @include('post.create')
    @include('post.edit')
    @include('post.show') --}}
    @include('Post.delete')

    <x-slot:script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_post', {
                order: []
            });
        </script>
        <script>
            $(document).ready(function() {
                $('table').on('click', '.deletebtn', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('title');

                    $('#delete_id').val(id);
                    $('#delete_title').html(name);
                });
            });
        </script>
    </x-slot:script>

</x-app-layout>
