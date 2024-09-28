<x-guest-layout>
    @include('Blog.partials.navbar')
    <div class="my-10 px-5">
        {{-- @include('Blog.partials.search') --}}
        <x-artikel-search :categories="$categories"></x-artikel-search>
    </div>
    <div id="benner" class="max-w-screen-xl mx-auto bg-gray-100 mb-10 rounded-lg p-5 md:p-0">
        <div class="max-w-3xl py-5 text-center mx-auto">
            <h1 class="text-gray-800 font-light text-lg uppercase">Selamat Datang di Portal Berita Kesehatan Terpercaya!
            </h1>
            <p class="md:text-lg text-md text-gray-600 font-bold">Dapatkan informasi terkini tentang <span
                    class="text-red-400">kesehatan, </span>termasuk tips gaya hidup sehat, berita medis terbaru, dan
                panduan perawatan pribadi. Temukan <span class="text-red-500">jawaban</span> atas pertanyaan kesehatan
                Anda dan ikuti update terbaru untuk hidup lebih sehat dan berkualitas!</p>
        </div>
    </div>

    @if ($populer)
        <div id="berita_populer" class="max-w-screen-xl mx-auto mb-10 rounded-lg">
            <div class="md:grid md:p-0 p-5 md:space-y-0 space-y-2 grid-cols-2 gap-5 items-center">
                <div class="col-span-1 h-[340px] w-full rounded-lg overflow-hidden">
                    @if ($populer->thumbnail)
                        <img class="h-full max-w-full w-full object-center rounded-lg hover:scale-105 duration-300"
                            src="{{ asset('storage/' . $populer->thumbnail) }}" alt="">
                    @else
                        <img class="h-full max-w-full w-full object-center rounded-lg hover:scale-105 duration-300"
                            src="{{ asset('images/no-thumbnail.jpg') }}" alt="">
                    @endif
                </div>
                <div class="col-span-1 h-auto rounded-lg overflow-hidden">
                    <span
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Artikel
                        Terpopuler</span>
                    {{-- <p class="text-md text-gray-600 mb-1">Dibuat pada {{ date_format($populer['created_at'], 'd F, Y') }}</p> --}}
                    <a href="{{ route('blog.show', ['post' => $populer->slug]) }}"
                        class="block text-gray-600 hover:text-blue-400 duration-300 font-bold text-2xl mt-2">{{ $populer['title'] }}</a>
                    {{-- <div id="body-artikel" class="text-gray-600 text-lg my-5">{!! Str::limit($populer->body, 420) !!}</div> --}}
                    <p class="text-red-600 text-lg">{{ $populer->category['title'] }} <span
                            class="text-gray-400 text-sm">&#9679; </span><span class="text-gray-400">telah dibaca
                            {{ $populer['views'] }} kali</span></p>
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-screen-xl mx-auto mb-28 rounded-lg md:p-0 p-5">
        <div class="group mb-5">
            <h1 class="text-2xl font-bold text-gray-800 md:mb-3 mb-1">Artikel Terbaru</h1>
            <div class="h-[5px] rounded-lg group-hover:w-32 transition-all duration-500 w-20 bg-red-500">
            </div>
        </div>
        <div id="post-container" class="md:grid grid-cols-5 gap-5 md:space-y-0 space-y-5">
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
                            class="text-gray-600 hover:text-blue-400 duration-300 font-bold text-md"
                            title="{{ $post->title }}">
                            {{ Str::limit($post->title, 60) }}</a>
                    </div>
                    {{-- <div id="body-artikel" class="h-[75px] text-gray-500 text-sm">
                        {!! Str::limit($post->body, 100) !!}
                    </div> --}}
                    <p class="text-red-400 text-sm mt-2 mb-1">{{ $post->category->title }}<span
                            class="text-gray-300 text-sm"> &#9679; </span><span class="text-gray-400">telah dibaca
                            {{ $post->views . ' kali' }}</span>
                    </p>
                </div>
            @empty
                <x-empty>Saat ini belum ada artikel yang tersedia untuk ditampilkan.</x-empty>
            @endforelse
        </div>
        @if (count($posts) > 1)
            <div class="text-center mt-8">
                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <button id="load-more"
                        class="absolute px-3 font-medium text-xl text-gray-600 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-600">
                        Load More
                    </button>
                </div>
            </div>
        @endif
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
