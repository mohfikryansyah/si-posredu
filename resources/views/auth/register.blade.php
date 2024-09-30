<x-app-layout>
    <div class="md:grid grid-cols-3 gap-5">
        <div class="col-span-2">
            <header class="w-full bg-white rounded-lg shadow">
                <div class="py-6 px-4">
                    <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
                        {{ __('Daftar Pengguna') }}
                    </h2>
                </div>
            </header>
            {{-- @dump($users->roles) --}}
            <div class="w-full relative overflow-x-auto rounded-lg shadow-md sm:rounded-lg bg-white my-5">
                <table id="table_user">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Terdaftar</th>
                            <th scope="col">Tipe Entitas</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th class="whitespace-nowrap">
                                    @if ($user->tipe_entitas == 'anak')
                                        {{ $user->anak->nama }}
                                    @elseif ($user->tipe_entitas == 'remaja')
                                        {{ $user->remaja->nama }}
                                    @elseif ($user->tipe_entitas == 'ibu')
                                        {{ $user->ibu->nama }}
                                    @elseif ($user->tipe_entitas == 'lansia')
                                        {{ $user->lansia->nama }}
                                    @elseif ($user->tipe_entitas == 'petugas')
                                        {{ $user->employee->nama }}
                                    @else
                                        {{ $user->name }}
                                    @endif
                                </th>
                                <td class="whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ date_format(date_create($user->created_at), 'd-m-Y') }}
                                </td>
                                <td class="whitespace-nowrap capitalize">
                                    {{ $user->tipe_entitas }}
                                </td>
                                <td class="whitespace-nowrap">
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        {{-- <a href="{{ route('jadwal-user.edit', ['jadwal_user' => $user->id]) }}"
                                            class="editbtn inline-flex items-center px-1 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-blue-700 focus:outline-none transition">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a> --}}
                                        <a x-data data-id={{ $user->id }} data-nama="{{ $user->nama }}"
                                            href="javascript:void(0);"
                                            x-on:click="$dispatch('open-modal', 'delete_user')"
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
                <h1 class="bg-orange-400 px-5 py-2.5 text-gray-100 font-medium">Buat Akun Kader/Masyarakat</h1>
                <div class="p-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="tipe_entitas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Pilih Entitas<span class="text-red-500">*</span>
                            </label>
                            <select id="tipe_entitas" name="tipe_entitas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                style="width: 100%;">
                                <option value="" disabled {{ old('tipe_entitas') == '' ? 'selected' : '' }}>Pilih
                                </option>
                                <option value="anak" {{ old('tipe_entitas') == 'anak' ? 'selected' : '' }}>Anak
                                </option>
                                <option value="remaja" {{ old('tipe_entitas') == 'remaja' ? 'selected' : '' }}>Remaja
                                </option>
                                <option value="ibu" {{ old('tipe_entitas') == 'ibu' ? 'selected' : '' }}>Ibu
                                </option>
                                <option value="lansia" {{ old('tipe_entitas') == 'lansia' ? 'selected' : '' }}>Lansia
                                </option>
                                <option value="petugas" {{ old('tipe_entitas') == 'petugas' ? 'selected' : '' }}>
                                    Petugas</option>
                            </select>
                        </div>

                        <div id="entity_details">
                            <!-- Fields for different entities will be added here dynamically -->
                        </div>

                        <div class="mt-4">
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role<span
                                    class="text-red-500">*</span></label>
                            <select id="role" name="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                style="width: 100%;">
                                <option disabled selected>Pilih</option>
                                @foreach ($roles as $role)
                                    @if (old('role') === $role->id)
                                        <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                    @else
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full border-gray-300" type="email"
                                name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full border-gray-300" type="password"
                                name="password" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300"
                                type="password" name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-save-button class="ms-4">
                                {{ __('SIMPAN') }}
                            </x-save-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL --->
    @include('auth.delete')

    <x-slot:script>

        <script>
            new DataTable('#table_user', {
                order: []
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get the old entity type
                var oldEntityType = "{{ old('tipe_entitas') }}";
                if (oldEntityType) {
                    document.getElementById('tipe_entitas').value = oldEntityType;
                    generateFields(oldEntityType); // Generate fields if there was an old value
                }

                document.getElementById('tipe_entitas').addEventListener('change', function() {
                    var entityType = this.value;
                    generateFields(entityType);
                });

                function generateFields(entityType) {
                    var detailsDiv = document.getElementById('entity_details');
                    detailsDiv.innerHTML = ''; // Clear previous fields

                    if (entityType === 'anak') {
                        detailsDiv.innerHTML = `
                            <div class="mt-4">
                                <label for="anak_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="anak_id" name="anak_id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option disabled selected>Pilih</option>
                            @foreach ($anaks as $anak)
                                <option value="{{ $anak->id }}" {{ old('anak_id') == $anak->id ? 'selected' : '' }}>{{ $anak->nama }}</option>
                            @endforeach
                                </select>
                            </div>
                        `;
                    } else if (entityType === 'remaja') {
                        detailsDiv.innerHTML = `
                            <div class="mt-4">
                                <label for="remaja_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="remaja_id" name="remaja_id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option disabled selected>Pilih</option>
                            @foreach ($remajas as $remaja)
                                <option value="{{ $remaja->id }}" {{ old('remaja_id') == $remaja->id ? 'selected' : '' }}>{{ $remaja->nama }}</option>
                            @endforeach
                                </select>
                            </div>
                        `;
                    } else if (entityType === 'lansia') {
                        detailsDiv.innerHTML = `
                            <div class="mt-4">
                                <label for="lansia_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="lansia_id" name="lansia_id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option disabled selected>Pilih</option>
                            @foreach ($lansias as $lansia)
                                <option value="{{ $lansia->id }}" {{ old('lansia_id') == $lansia->id ? 'selected' : '' }}>{{ $lansia->nama }}</option>
                            @endforeach
                                </select>
                            </div>
                        `;
                    } else if (entityType === 'ibu') {
                        detailsDiv.innerHTML = `
                            <div class="mt-4">
                                <label for="ibu_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="ibu_id" name="ibu_id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option disabled selected>Pilih</option>
                            @foreach ($ibus as $ibu)
                                <option value="{{ $ibu->id }}" {{ old('ibu_id') == $ibu->id ? 'selected' : '' }}>{{ $ibu->nama }}</option>
                            @endforeach
                                </select>
                            </div>
                        `;
                    } else if (entityType === 'petugas') {
                        detailsDiv.innerHTML = `
                            <div class="mt-4">
                                <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="employee_id" name="employee_id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option disabled selected>Pilih</option>
                            @foreach ($kaders as $kader)
                                <option value="{{ $kader->id }}" {{ old('employee_id') == $kader->id ? 'selected' : '' }}>{{ $kader->nama }}</option>
                            @endforeach
                                </select>
                            </div>
                        `;
                    }
                    // Reinitialize select2 after fields are added dynamically
                    $('.select2nama').select2();
                }
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
