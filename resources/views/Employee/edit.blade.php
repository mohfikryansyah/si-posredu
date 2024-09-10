<x-app-layout>
    <div class="md:grid grid-cols-3 gap-5">
        <div class="col-span-2">
            <header class="w-full bg-white rounded-lg shadow">
                <div class="py-6 px-4">
                    <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                        {{ __('Daftar Petugas') }}
                    </h2>
                </div>
            </header>

            <div class="w-full relative overflow-x-auto rounded-lg shadow-md sm:rounded-lg bg-white my-5">
                <table id="table_employee">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Lahir</th>
                            <th scope="col">Bergabung sejak</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        alt="Jese image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $employee->nama }}</div>
                                        @if ($employee->user !== null)
                                            <div class="font-normal text-gray-500">{{ $employee->user->email }}</div>
                                        @endif
                                    </div>
                                </th>
                                <td class="whitespace-nowrap">
                                    {{ $employee->tempat_tanggal_lahir }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $employee->join }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $employee->alamat }}
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}"
                                            class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a x-data data-id={{ $employee->id }} data-nama="{{ $employee->nama }}"
                                            href="javascript:void(0);"
                                            x-on:click="$dispatch('open-modal', 'delete_employee')"
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
        <div class="col-sm-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <h1 class="bg-orange-400 px-5 py-2.5 text-gray-100 font-medium">Ubah Petugas</h1>
                <div class="p-5">
                    <form action="{{ route('employee.update', ['employee' => $e->id]) }}" method="POST"
                        class="max-w-sm mx-auto">
                        @method('PUT')
                        @csrf
                        <div class="mb-5">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                                    class="text-red-500">*</span></label>
                            <x-text-input name="nama" id="nama"
                                class="{{ $errors->edit_employee->has('nama') ? 'border-red-500' : 'border-gray-300' }}"
                                value="{{ old('nama', $e->nama) }}"></x-text-input>
                            @error('nama', 'edit_employee')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="tempat_tanggal_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal
                                Lahir<span class="text-red-500">*</span></label>
                            <x-text-input name="tempat_tanggal_lahir" id="tempat_tanggal_lahir"
                                class="{{ $errors->edit_employee->has('tempat_tanggal_lahir') ? 'border-red-500' : 'border-gray-300' }}"
                                autocomplete="off"
                                value="{{ old('tempat_tanggal_lahir', $e->tempat_tanggal_lahir) }}"></x-text-input>
                            @error('tempat_tanggal_lahir', 'edit_employee')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="join"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Bergabung<span class="text-red-500">*</span></label>
                            <x-date-input name="join" id="join"
                                class="{{ $errors->edit_employee->has('join') ? 'border-red-500' : 'border-gray-300' }}"
                                autocomplete="off" value="{{ old('join', $e->join) }}"></x-date-input>
                            @error('join', 'edit_employee')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat<span
                                    class="text-red-500">*</span></label>
                            <x-text-input name="alamat" id="alamat"
                                class="{{ $errors->edit_employee->has('alamat') ? 'border-red-500' : 'border-gray-300' }}"
                                autocomplete="off" value="{{ old('alamat', $e->alamat) }}"></x-text-input>
                            @error('alamat', 'edit_employee')
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
    @include('Employee.delete')

    <x-slot:script>
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        <script>
            new DataTable('#table_employee', {
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
