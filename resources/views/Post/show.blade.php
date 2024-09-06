<x-app-layout>
    <div class="bg-white rounded-lg max-w-3xl p-5 mt-5">
        <div class="flex mb-4 gap-1">
            <a href="{{ route('posts.index') }}"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fa-solid fa-arrow-left me-2"></i>
                Kembali
            </a>
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <i class="fa-regular fa-pen-to-square me-2"></i>
                Ubah
            </a>
            <a x-data data-id={{ $post->id }} data-title="{{ $post->title }}" href="javascript:void(0);"
                x-on:click="$dispatch('open-modal', 'delete_post')"
                class="deletebtn px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <i class="fa-solid fa-trash-can-arrow-up me-2"></i>
                Hapus
            </a>
        </div>
        <h2 class="font-semibold md:text-[24px] text-lg text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
        <div class="flex justify-between">
            <p class="text-gray-400 text-sm my-3">Dibuat pada {{ date_format($post->created_at, 'd F, Y') }}</p>
            <p class="text-gray-400 text-sm my-3">Kategori: {{ $post->category->title }}</p>
        </div>
        <div id="body-artikel" class="text-gray-400">
            {!! $post->body !!}
        </div>
    </div>

    @include('Post.delete')

    <x-slot:script>
        <script>
            $(document).ready(function() {
                $('.deletebtn').on('click', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('title');
                    
                    $('#delete_id').val(id);
                    $('#delete_title').html(name);
                });
            });
        </script>
    </x-slot:script>
</x-app-layout>
