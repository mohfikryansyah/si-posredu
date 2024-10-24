<x-app-layout>
    <header class="max-w-4xl bg-white rounded-lg shadow">
        <div class="py-6 px-4">
            <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                {{ __('Edit Dokumentasi Kegiatan') }}
            </h2>
        </div>
    </header>

    <div class="bg-white rounded-lg shadow max-w-4xl mt-5 p-5">
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul<span
                        class="text-red-500">*</span></label>
                <x-text-input name="title" id="title"
                    class="{{ $errors->edit_dokumentasi->has('title') ? 'border-red-500' : 'border-gray-300' }}"
                    value="{{ old('title', $gallery->title) }}"></x-text-input>
                @error('title', 'edit_dokumentasi')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unggah Gambar<span
                    class="text-red-500">*</span></p>
                <div class="flex items-center justify-center w-full">
                    <label for="images" class="flex flex-col items-center justify-center w-full h-64 border-2 {{ $errors->edit_dokumentasi->has('images[]') ? 'border-red-500' : 'border-gray-300' }} border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-center text-gray-500 dark:text-gray-400">SVG, PNG, JPG or JPEG (Ukuran yang disarankan 507x375px)</p>
                            <!-- Placeholder for displaying selected file count -->
                            <p id="file-count" class="text-md text-red-500 mt-2 dark:text-gray-400"></p>
                        </div>
                        <input id="images" type="file" name="images[]" class="hidden" multiple />
                    </label>
                </div>
            </div>

            <x-save-button>Simpan</x-save-button>
        </form>
    </div>

    <x-slot:script>
        <script>
            document.getElementById('images').addEventListener('change', function(event) {
                const fileInput = event.target;
                const fileCount = fileInput.files.length;
                const fileCountElement = document.getElementById('file-count');
        
                // Update the text to show the number of selected files
                if (fileCount > 0) {
                    fileCountElement.textContent = fileCount + ' file(s) selected';
                } else {
                    fileCountElement.textContent = ''; // Reset if no file is selected
                }
            });
        </script>
    </x-slot:script>
</x-app-layout>
