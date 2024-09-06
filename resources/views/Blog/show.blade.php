<x-guest-layout>
    @include('Blog.partials.navbar')
    <div class="mt-10">
        @include('Blog.partials.search')
    </div>

    <div id="tes" class="max-w-screen-xl md:mt-14 mx-auto mb-10 md:p-0">
        <div class="md:grid grid-cols-3 p-5 md:space-x-5">
            <div class="col-span-2 md:pr-16 md:border-r">
                <div class="flex justify-center mb-4">
                    <span
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $readPost->category->title }}</span>
                    <p class="text-gray-400 text-md">{{ date_format($readPost->created_at, 'd F, Y') }}</p>
                </div>
                <h1 class="text-3xl font-bold text-gray-600 text-center">{{ $readPost->title }}</h1>
                <div id="body-artikel" class="text-gray-600 mt-4">{!! $readPost->body !!}</div>
            </div>
            <div class="col-span-1 md:mt-0 mt-8">
                <div id="artikel-terkait">
                    <div class="group">
                        <h1 class="text-2xl font-bold text-gray-800 md:mb-3 mb-1">Artikel Terkait</h1>
                        <div class="h-[5px] rounded-lg group-hover:w-32 transition-all duration-500 w-20 bg-red-500">
                        </div>
                    </div>
                    <div class="space-y-5 mt-5">
                        @forelse ($postTerkaits as $postTerkait)
                            <div class="rounded-lg overflow-hidden">
                                @if ($postTerkait->thumbnail)
                                    <img class="h-[200px] w-full rounded-lg hover:scale-105 duration-300"
                                        src="{{ asset('storage/' . $postTerkait->thumbnail) }}"
                                        alt="{{ $postTerkait->title }}">
                                @else
                                    <img class="w-full h-[200px] rounded-lg hover:scale-105 duration-300"
                                        src="{{ asset('images/no-thumbnail.jpg') }}" alt="No Thumbnail">
                                @endif
                                <p class="text-gray-400 text-sm mt-2 mb-1">
                                    {{ date_format($postTerkait->created_at, 'd F, Y') }}
                                </p>
                                <a href="{{ route('blog.show', ['post' => $postTerkait->slug]) }}"
                                    class="text-gray-600 hover:text-blue-400 duration-150 font-bold text-md" title="{{ $postTerkait->title }}">
                                    {{ Str::limit($postTerkait->title, 80) }}
                                </a>
                                <div id="body-artikel" class="text-gray-500 text-sm">{!! Str::limit($postTerkait->body, 100) !!}</div>
                                <div class="text-red-400 text-sm mt-2 mb-1">
                                    {{ $postTerkait->category->title }}
                                    <span class="text-gray-300 text-sm"> &#9679; </span>
                                    <span class="text-gray-400">telah dibaca {{ $postTerkait->views }} kali</span>
                                </div>
                            </div>
                        @empty
                            <div id="artikel-0"
                                class="w-full mx-auto flex items-center justify-center bg-gray-100 mb-10 rounded-lg p-5">
                                <div class="max-w-3xl text-center">
                                    <div
                                        class="mx-auto w-10 h-10 mb-4 text-gray-500 bg-gray-200 rounded-full flex justify-center items-center text-sm">
                                        <i class="fa-solid fa-x"></i>
                                    </div>
                                    <h1 class="text-gray-800 font-light text-lg uppercase">
                                        Tidak ada artikel terkait.
                                    </h1>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto mb-28 rounded-lg">
        <h1 class="text-2xl md:pl-0 pl-5 font-bold text-gray-800 md:mb-3 mb-1">Artikel Terbaru</h1>
        <div id="post-container" class="md:grid grid-cols-5 gap-5 md:p-0 px-5 pb-5 md:space-y-0 space-y-3">
            @forelse ($posts as $post)
                <div class="rounded-lg overflow-hidden">
                    @if ($post->thumbnail)
                        <img class="h-[220px] w-full rounded-lg hover:scale-105 duration-300"
                            src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                    @else
                        <img class="w-full h-[220px] rounded-lg hover:scale-105 duration-300"
                            src="{{ asset('images/no-thumbnail.jpg') }}" alt="">
                    @endif
                    <p class="text-gray-400 text-sm mt-2 mb-1">{{ date_format($post->created_at, 'd F, Y') }}</p>
                    <div class="h-[75px]">
                        <a href="{{ route('blog.show', ['post' => $post->slug]) }}"
                            class="text-gray-600 hover:text-blue-400 duration-150 font-bold text-md" title="{{ $post->title }}">
                            {{ Str::limit($post->title, 60) }}</a>
                    </div>
                    <div id="body-artikel" class="h-[75px] text-gray-500 text-sm">
                        {!! Str::limit($post->body, 100) !!}
                    </div>
                    <p class="text-red-400 text-sm mt-2 mb-1">{{ $post->category->title }}<span
                            class="text-gray-300 text-sm"> &#9679; </span><span class="text-gray-400">telah dibaca
                            {{ $post->views . ' kali' }}</span>
                    </p>
                </div>
            @empty
                <div id="artikel-0"
                    class="max-w-screen-xl mx-auto h-[200px] flex items-center justify-center bg-gray-100 mb-10 rounded-lg">
                    <div class="max-w-3xl">
                        <div
                            class="mx-auto w-10 h-10 mb-4 text-gray-500 bg-gray-200 rounded-full relative flex justify-center items-center text-sm">
                            <i class="fa-solid fa-x"></i>
                        </div>
                        <h1 class="text-gray-800 font-light text-lg uppercase">
                            Saat ini belum ada artikel yang tersedia untuk ditampilkan.
                        </h1>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-8">
            <div class="inline-flex items-center justify-center w-full">
                <hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <button id="load-more"
                    class="absolute px-3 font-medium text-xl text-gray-600 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-600">
                    Load More
                </button>
            </div>
        </div>
    </div>

    <x-slot:script>
        <script>
            $(document).ready(function() {
                var skip = {{ $posts->count() }}; // Mulai dari jumlah post yang sudah di-load

                $('#load-more').click(function() {
                    $.ajax({
                        url: "{{ route('blog.loadMore') }}", // Sesuaikan dengan route yang kamu buat
                        method: "GET",
                        data: {
                            skip: skip
                        },
                        success: function(data) {
                            $('#post-container').append(data); // Tambahkan post baru ke container
                            skip += {{ $posts->count() }}; // Update jumlah post yang di-skip
                        }
                    });
                });
            });
        </script>
    </x-slot:script>


</x-guest-layout>
