<!-- Modal Component -->
<x-modal name="edit_nik" id="edit_nik" :show="$errors->edit_nik->any()" maxWidth="2xl" focusable>
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">Ubah Data Lansia</h2>
        <p class="mt-4 text-sm text-gray-600">
            Periksa semua data sebelum menyimpan.
        </p>

        <form action="{{ route('master.update') }}" method="POST" class="mt-4">
            @method("PUT")
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <input type="hidden" name="id" id="edit_id" value="{{ old('id') }}">
                <div class="col-span-2 w-full">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK<span
                            class="text-red-500">*</span></label>
                    <x-number-input name="nik" id="edit_nik"
                        class="{{ $errors->edit_nik->has('nik') ? 'border-red-500' : 'border-gray-300' }}" required
                        value="{{ old('nik') }}"></x-number-input>
                    @error('nik', 'edit_nik')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-save-button class="ms-3">
                    {{ __('Simpan') }}
                </x-save-button>
            </div>
        </form>
    </div>
</x-modal>
