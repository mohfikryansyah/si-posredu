<!-- Modal Component -->
<x-modal name="export_pemeriksaan_lansia" id="export_pemeriksaan_lansia" :show="false" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Export Data Anak</h2>

        <form action="{{ route('pemeriksaanLansia.export') }}" method="GET" class="mt-4">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                    <label for="lansia_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                            class="text-red-500">*</span></label>
                    <select id="export_lansia_id" name="lansia_id"
                        class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        style="width: 100%;">
                        <option value="" selected>Semua</option>
                        @foreach ($pemeriksaans as $lansia)
                            @if (old('lansia_id') === $lansia->lansia->id)
                                <option unvalue="{{ $lansia->lansia->id }}" selected>{{ $lansia->lansia->nama }}</option>
                            @else
                                <option value="{{ $lansia->lansia->id }}">{{ $lansia->lansia->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('lansia_id', 'export_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-2">
                    <label for="start"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai tanggal<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="start" id="start" class="{{ $errors->export_pemeriksaan_lansia->has('start') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('start') }}"></x-date-input>
                    @error('start', 'export_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:col-span-1 col-span-2">
                    <label for="end"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampai tanggal<span
                            class="text-red-500">*</span></label>
                    <x-date-input name="end" id="end" class="{{ $errors->export_pemeriksaan_lansia->has('end') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('end') }}"></x-date-input>
                    @error('end', 'export_pemeriksaan_lansia')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-save-button x-on:click="$dispatch('close')" class="ms-3">
                    {{ __('Export') }}
                </x-save-button>
            </div>
        </form>
    </div>
</x-modal>
