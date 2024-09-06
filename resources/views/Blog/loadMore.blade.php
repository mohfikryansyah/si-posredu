@foreach ($posts as $post)
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
                class="text-gray-600 hover:text-blue-400 duration-300 font-bold text-md" title="{{ $post->title }}">
                {{ Str::limit($post->title, 60) }}</a>
        </div>
        <div id="body-artikel" class="h-[75px] text-gray-500 text-sm">
            {!! Str::limit($post->body, 100) !!}
        </div>
        <p class="text-red-400 text-sm mt-2 mb-1">{{ $post->category->title }}<span class="text-gray-300 text-sm">
                &#9679; </span><span class="text-gray-400">telah dibaca
                {{ $post->views . ' kali' }}</span>
        </p>
    </div>
@endforeach
