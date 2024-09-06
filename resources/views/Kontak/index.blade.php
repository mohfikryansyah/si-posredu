<x-app-layout>

    <div class="max-w-sm md:mt-0 mt-5">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <h1 class="bg-orange-400 px-5 py-2.5 text-gray-100 font-medium">Ubah Kontak</h1>
            <div class="p-5">
                <form action="{{ route('kontak.update', ['kontak' => $kontak['id']]) }}" method="POST"
                    >
                    @csrf
                    @method("PUT")
                    <div class="mb-5">
                        <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Lokasi</label>
                        <x-text-input name="lokasi" id="lokasi"
                            class="{{ $errors->edit_kontak->has('lokasi', $kontak['lokasi']) ? 'border-red-500' : 'border-gray-300' }}"
                            value="{{ $kontak['lokasi'] }}"></x-text-input>
                        @error('lokasi', 'edit_kontak')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <x-text-input name="email" id="email"
                            class="{{ $errors->edit_kontak->has('email', $kontak['email']) ? 'border-red-500' : 'border-gray-300' }}"
                            value="{{ $kontak['email'] }}"></x-text-input>
                        @error('email', 'edit_kontak')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            Telepon/Whatsapp</label>
                        <x-number-input name="no_tlp" id="no_tlp"
                            class="{{ $errors->edit_kontak->has('no_tlp', $kontak['no_tlp']) ? 'border-red-500' : 'border-gray-300' }}"
                            value="{{ $kontak['no_tlp'] }}"></x-number-input>
                        @error('no_tlp', 'edit_kontak')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <x-save-button>Simpan</x-save-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
