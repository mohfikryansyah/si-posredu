<x-app-layout>
    <header class="max-w-3xl bg-white rounded-lg shadow">
        <div class="py-6 px-4">
            <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                {{ __('Buat Artikel') }}
            </h2>
        </div>
    </header>

    <div class="bg-white rounded-lg shadow max-w-3xl mt-5 p-5">
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" class="w-full mx-auto">
            @method('PUT')
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <x-text-input name="title" id="title"
                    class="{{ $errors->edit_post->has('title') ? 'border-red-500' : 'border-gray-300' }}"
                    value="{{ old('title', $post->title) }}"></x-text-input>
                @error('title', 'edit_post')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="hidden">
                <x-text-input name="slug" id="slug"
                    class="{{ $errors->edit_post->has('slug') ? 'border-red-500' : 'border-gray-300' }}"
                    value="{{ old('slug', $post->slug) }}"></x-text-input>
            </div>
            <div class="mb-5">
                <label for="category_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori<span
                        class="text-red-500">*</span></label>
                <select id="category_id" name="category_id"
                    class="select2kategori bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    style="width: 100%;" required>
                    <option disabled selected>Pilih</option>
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) === $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id', 'edit_post')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Artikel<span
                        class="text-red-500">*</span></p>
                <div id="editor" class="rounded-b-lg">{!! old('body', $post->body) !!}</div>
                <input type="hidden" name="body" id="body">
                @error('body', 'edit_post')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <x-save-button>Simpan</x-save-button>
        </form>
    </div>

    <x-slot:script>
        <script>
            $(document).ready(function() {
                var quill = new Quill('#editor', {
                    theme: 'snow'
                });

                $('form').on('submit', function() {
                    var body = quill.root.innerHTML;
                    $('#body').val(body);
                });
            });
        </script>
    </x-slot:script>
</x-app-layout>
