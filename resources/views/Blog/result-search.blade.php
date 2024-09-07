<x-guest-layout>
    @include('Blog.partials.navbar')
    <div class="my-10 px-5">
        <x-artikel-search :categories="$categories" :category="$category" :value="$keyword"></x-artikel-search>
    </div>
    <div class="max-w-screen-xl mx-auto mb-28 mt-20 rounded-lg">
        <h1 class="text-2xl md:pl-0 pl-5 font-bold text-gray-800 md:mb-3 mb-1">Search : {{ $category }}</h1>
        <div id="post-container" class="md:grid grid-cols-5 gap-5 md:p-0 px-5 pb-5 md:space-y-0 space-y-3">
            @forelse ($results as $result)
                <div class="rounded-lg overflow-hidden">
                    @if ($result->thumbnail)
                        <img class="h-[220px] w-full rounded-lg hover:scale-105 duration-300"
                            src="{{ asset('storage/' . $result->thumbnail) }}" alt="">
                    @else
                        <img class="w-full h-[220px] rounded-lg hover:scale-105 duration-300"
                            src="{{ asset('images/no-thumbnail.jpg') }}" alt="">
                    @endif
                    <p class="text-gray-400 text-sm mt-2 mb-1">{{ date_format($result->created_at, 'd F, Y') }}</p>
                    <div class="h-[75px]">
                        <a href="{{ route('blog.show', ['post' => $result->slug]) }}"
                            class="text-gray-600 hover:text-blue-400 duration-150 font-bold text-md" title="{{ $result->title }}">
                            {{ Str::limit($result->title, 60) }}</a>
                    </div>
                    <div id="body-artikel" class="h-[75px] text-gray-500 text-sm">
                        {!! Str::limit($result->body, 100) !!}
                    </div>
                    <p class="text-red-400 text-sm mt-2 mb-1">{{ $result->category->title }}<span
                            class="text-gray-300 text-sm"> &#9679; </span><span class="text-gray-400">telah dibaca
                            {{ $result->views . ' kali' }}</span>
                    </p>
                </div>
            @empty
                <div id="artikel-0"
                    class="w-full col-span-5 mx-auto h-[200px] flex items-center justify-center bg-gray-100 mb-10 rounded-lg">
                    <div class="w-full">
                        <div
                            class="mx-auto w-10 h-10 mb-4 text-gray-500 bg-gray-200 rounded-full relative flex justify-center items-center text-sm">
                            <i class="fa-solid fa-x"></i>
                        </div>
                        <h1 class="text-gray-800 text-center font-light text-lg uppercase">
                            Artikel yang dimaksud tidak ditemukan.
                        </h1>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

</x-guest-layout>