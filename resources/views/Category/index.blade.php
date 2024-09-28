<x-app-layout>
    <div class="md:grid grid-cols-3 gap-5">
        <div class="col-span-2">
            <header class="w-full bg-white rounded-lg shadow">
                <div class="py-6 px-4">
                    <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                        {{ __('Daftar Kategori') }}
                    </h2>
                </div>
            </header>

            <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg bg-white mt-5">
                <table id="table_category">
                    <thead>
                        <tr>
                            <th scope="col">Kategori</th>
                            <th scope="col">Dibuat Pada</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th class="whitespace-nowrap">
                                    {{ $category->title }}
                                </th>
                                <td class="whitespace-nowrap">
                                    {{ date_format($category->created_at, 'd F, Y') }}
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                            class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a x-data data-id={{ $category->id }} data-nama="{{ $category->title }}"
                                            href="javascript:void(0);"
                                            x-on:click="$dispatch('open-modal', 'delete_category')"
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
        <div class="col-sm-auto md:mt-0 mt-5">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <h1 class="bg-orange-400 px-5 py-2.5 text-gray-100 font-medium">Buat Kategori</h1>
                <div class="p-5">
                    <form action="{{ route('categories.store') }}" method="POST" class="w-full mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Kategori</label>
                            <x-text-input name="title" id="title"
                                class="{{ $errors->add_category->has('title') ? 'border-red-500' : 'border-gray-300' }}"></x-text-input>
                            @error('title', 'add_category')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <x-save-button>Simpan</x-save-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL --->
    @include('Category.delete')

    <x-slot:script>
        
        <script>
            new DataTable('#table_category', {
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
